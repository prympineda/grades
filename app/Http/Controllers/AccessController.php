<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ActivityLogs;
use App\User;
use App\Quarter;
use App\Semester;

class AccessController extends Controller
{
    //
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request['email'];
        $password = $request['password'];
        $code = $request['code'];

        $quater = Quarter::whereStatus(1)->first();
        $semester = Semester::whereStatus(1)->first();

        if (Auth::attempt(['email' => $email, 'password' => $password], True)) {

            if (Auth::user()->is_active != 1) {
                Auth::logout();
                return redirect()->back()->with('error', 'Your Accout is Inactive! Please Report to Admin.');

            }

                // check if user is using right login page
                if ($code != Auth::user()->role_id) {
                    // redirect to a message
                    if (Auth::user()->role_id == 1) {
                        // redirect to admin login
                        Auth::logout();
                        return redirect()->route('admin_login')->with('error', 'You use wrong login page. Use this instead.');
                    }
                    if (Auth::user()->role_id == 2) {
                        // redirect to teacher login
                        Auth::logout();
                        return redirect()->route('teacher_login')->with('error', 'You use wrong login page. Use this instead.');
                    }
                    if (Auth::user()->role_id == 3) {
                        // redirect to admin login
                        Auth::logout();
                        return redirect()->route('student_login')->with('error', 'You use wrong login page. Use this instead.');
                    }
                }


                if (Auth::user()->role_id == 1) {

                    /*
            	 * User Log
            	 */
                    $user_log = new ActivityLogs();

                    $user_log->user_id = Auth::user()->id;
                    $user_log->action = 'Admin Login';
                    $user_log->save();

                    return redirect()->route('admin_dashboard');
                }

                /*
			 * Redirect to Co-Admin Panel if privilege is co-admin
			 */
                if (Auth::user()->role_id == 2) {


                    if (count($quater) == 0) {
                        Auth::logout();
                        return 'System is initializing by admin';
                    }

                    if (count($semester) == 0) {
                        Auth::logout();
                        return 'System is initializing by admin';
                    }


                    /*
            	 * User Log
            	 */
                    $user_log = new ActivityLogs();
                    $user_log->user_id = Auth::user()->id;
                    $user_log->action = 'Teachers Login: ';
                    $user_log->save();

                    return redirect()->route('teacher_dashboard');;
                }

                if (Auth::user()->role_id == 3) {


                    if (count($quater) == 0) {
                        Auth::logout();
                        return 'System is initializing by admin';
                    }

                    if (count($semester) == 0) {
                        Auth::logout();
                        return 'System is initializing by admin';
                    }

                    /*
            	 * User Log
            	 */
                    $user_log = new ActivityLogs();
                    $user_log->user_id = Auth::user()->id;
                    $user_log->action = 'Student Login: ';
                    $user_log->save();

                    return redirect()->route('get_student_dashboard');;
                }
            }
        
        return redirect()->back()->with('error', 'E-mail or Password Incorrect!');
    }

    public function getLogout()
    {
        if(empty(Auth::user())) {
			return redirect()->route('landing_page')->with('warning', 'Login first!');
		}
        $user_log = new ActivityLogs();

		$user_log->user_id = Auth::user()->id;
		if(Auth::user()->role_id == 1) {
			$user_log->action = 'Admin Logout';
		}
		elseif(Auth::user()->role_id == 2) {
			$user_log->action = 'Teacher Logout: ' . Auth::user()->id;
		}
		else {
			$user_log->role_id = 'Student Logout: ' . Auth::user()->id;
		}
        $user_log->save();
        
        Auth::logout();
        return redirect()->route('landing_page');
    }
}
