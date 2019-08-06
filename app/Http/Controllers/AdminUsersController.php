<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\GradeLevel;
use App\Section;
use App\Subject;
use App\Quarter;
use App\Semester;
use App\SubjectAssign;
use App\StudentInfo;
use App\ActivityLogs;
use DB;

class AdminUsersController extends Controller
{
    //
    public function getAdminDashboard()
    {
        $admin = User::where('role_id', 1)->count();
        $teacher = User::where('role_id', 2)->count();
        $student = User::where('role_id', 3)->count();
        $active_quarter = Quarter::whereStatus(1)->first();
        $active_semester = Semester::whereStatus(1)->first();
    
        return view('admin.index', ['admin' => $admin, 'teacher' => $teacher, 'student' => $student, 'active_quarter' => $active_quarter, 'active_semester' => $active_semester]);
       
    }


    public function getAllAdmins()
    {
        $users = User::where('role_id', 1)->paginate(3);
        return view('admin.users.view-all-admins', ['users' => $users]);
    }

    public function getAddAdmin()
    {
        return view('admin.users.add-admin');
    }

    public function postAddAdmin(Request $request)
    {
        //INPUT VALIDATION
        // $input = $request->all();
        // $validator = Validator::make($input, [
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required'
        ]);


        // ASSIGN INPUT VULES TO VARIABLES
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $middlename = $request['middlename'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $gender = $request['gender'];
        $address = $request['address'];
        $email = $request['email'];
        $mobile = $request['mobile'];

        // Check email availability
        $email_check = User::where('email', $email)->first();

        if (!empty($email_check)) {
            return redirect()->route('get_add_admin')->withInput();
        }

        $add = new User();

        $add->firstname = $firstname;
        $add->lastname = $lastname;
        $add->middlename = $middlename;
        $add->birthday = $birthday;
        $add->gender = $gender;
        $add->address = $address;
        $add->email = $email;
        $add->mobile = $mobile;
        $add->password = bcrypt('admin2019');
        $add->role_id = 1;
        $add->is_active = 1;


        $add->save();

        
        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Add Admin - ' . $add->firstname;
        $log->save();

        return redirect()->route('get_add_admin')->with('success', 'Admin Added: ');;
    }

    public function showEditAdmin($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.edit-admin', compact('user'));
    }

    public function postEditAdmin(Request $request)
    {

        $this->validate(request(), [

            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);


        // ASSIGN INPUT VULES TO VARIABLES
        $id = $request['id'];
        $is_active = $request['is_active'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $middlename = $request['middlename'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $gender = $request['gender'];
        $address = $request['address'];
        $email = $request['email'];
        $mobile = $request['mobile'];


        if ($id == null) {
            // If the script is modified suspiciously
            return 'Error Occured. Please Reload This Page.';
        }

        $user = User::findorfail($id);


        // Check email availability
        if ($email != $user->email) {
            // check email is existing
            $email_check = User::where('email', $email)->first();

            if ($email_check == True) {
                return redirect()->route('get_edit_admin', $user->user_id)->with('error_msg', 'Email already in use.');
            }
        }
        if (Auth::user()->id == $id) {
            $is_active = 1;
        }

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->middlename = $middlename;
        $user->birthday = $birthday;
        $user->gender = $gender;
        $user->address = $address;
        $user->email = $email;
        $user->mobile = $mobile;
        $user->is_active = $is_active;


        $user->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Update Admin - ' . $user->firstname;
        $log->save();


        return redirect()->route('get_all_admins')->with('warning', 'Update Details for: ' . ucwords($firstname));
    }


    public function getDeleteAdmin($id)
    {
        $user = User::findorfail($id);
        $delete = $user->firstname;
        $user->delete();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Delete Admin - ' . $delete;
        $log->save();

        return redirect()->back()->with('danger', 'Admin Deleted');
    }




    // ------------------TEACHER--------------------


    public function getAllTeachers()
    {
        $users = User::where('role_id', 2)->paginate(3);
        return view('admin.users.view-all-teachers', ['users' => $users]);
    }

    public function postAddTeacher(Request $request)
    {
        //INPUT VALIDATION
        // $input = $request->all();
        // $validator = Validator::make($input, [
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required'
        ]);


        // ASSIGN INPUT VULES TO VARIABLES
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $middlename = $request['middlename'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $gender = $request['gender'];
        $address = $request['address'];
        $email = $request['email'];
        $mobile = $request['mobile'];

        // Check email availability
        $email_check = User::where('email', $email)->first();

        if (!empty($email_check)) {
            return redirect()->route('get_add_teacher')->withInput();
        }

        $add = new User();

        $add->firstname = $firstname;
        $add->lastname = $lastname;
        $add->middlename = $middlename;
        $add->birthday = $birthday;
        $add->gender = $gender;
        $add->address = $address;
        $add->email = $email;
        $add->mobile = $mobile;
        $add->password = bcrypt('teacher2019');
        $add->role_id = 2;
        $add->is_active = 1;


        $add->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Add Teacher - ' . $add->firstname;
        $log->save();

        return redirect()->route('get_add_teacher')->with('success', 'Teacher Added');;
    }

    public function getAddTeacher()
    {
        return view('admin.users.add-teacher');
    }

    public function showEditTeacher($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.edit-teacher', compact('user'));
    }

    public function postEditTeacher(Request $request)
    {

        $this->validate(request(), [

            'is_active' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);


        // ASSIGN INPUT VULES TO VARIABLES
        $id = $request['id'];
        $is_active = $request['is_active'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $middlename = $request['middlename'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $gender = $request['gender'];
        $address = $request['address'];
        $email = $request['email'];
        $mobile = $request['mobile'];


        if ($id == null) {
            // If the script is modified suspiciously
            return 'Error Occured. Please Reload This Page.';
        }

        $user = User::findorfail($id);


        // Check email availability
        if ($email != $user->email) {
            // check email is existing
            $email_check = User::where('email', $email)->first();

            if ($email_check == True) {
                return redirect()->route('get_edit_teachers', $user->user_id)->with('error', 'Email already in use.');
            }
        }

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->middlename = $middlename;
        $user->birthday = $birthday;
        $user->gender = $gender;
        $user->address = $address;
        $user->email = $email;
        $user->mobile = $mobile;
        $user->is_active = $is_active;


        $user->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Update Teacher - ' . $user->firstname;
        $log->save();

        return redirect()->route('get_all_teachers')->with('info', 'Update Details for: ' . ucwords($firstname));
    }

    public function getDeleteTeacher($id)
    {
        $user = User::findorfail($id);
        $delete = $user->firstname;
        $user->delete();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Delete Teacher - ' . $delete;
        $log->save();

        return redirect()->back()->with('danger', 'Teacher Deleted');
    }



    // ------------------STUDENTS--------------------

    public function getAllStudents()
    {
        $users = User::where('role_id', 3)->paginate(3);
        return view('admin.users.view-all-students', ['users' => $users]);
    }

    
    public function getAddStudent()
    {
        $sections = Section::orderBy('level', 'asc')
                            ->orderBy('name', 'asc')
                            ->get();

        return view('admin.users.add-student', ['sections' => $sections]);
    }

    public function postAddStudent(Request $request)
    {
        //INPUT VALIDATION
        // $input = $request->all();
        // $validator = Validator::make($input, [
        $this->validate(request(), [
            'section' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required'
        ]);


        // ASSIGN INPUT VULES TO VARIABLES
        $section = $request['section'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $middlename = $request['middlename'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $gender = $request['gender'];
        $address = $request['address'];
        $email = $request['email'];
        $mobile = $request['mobile'];

        // Check email availability
        $email_check = User::where('email', $email)->first();

        if (!empty($email_check)) {
            return redirect()->route('get_add_students')->withInput();
        }

        $add = new User();

        $add->firstname = $firstname;
        $add->lastname = $lastname;
        $add->middlename = $middlename;
        $add->birthday = $birthday;
        $add->gender = $gender;
        $add->address = $address;
        $add->email = $email;
        $add->mobile = $mobile;
        $add->password = bcrypt('concs2019');
        $add->role_id = 3;
        $add->is_active = 1;

        // $info[] = ['section' => $section];
        // DB::table('student_infos')->insert($info);
        if($add->save()){

        $info = new StudentInfo();
        $info->section_id = $section;
        $info->user_id = $add->id;
        $info->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Add Student - ' . $add->firstname . ' - ' . $info->section->grade_level->name . '-' . ucwords($info->section->name);
        $log->save();

        return redirect()->route('get_add_student')->with('success', 'Student Added');;
        }
    }


    public function showEditStudent($id)
    {
        $student = User::findorfail($id);
        $section = Section::all();
        return view('admin.users.edit-student',['section' => $section, 'student' => $student]);
    }

    public function postEditStudent(Request $request)
    {

        $this->validate(request(), [
            'section' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);


        // ASSIGN INPUT VULES TO VARIABLES
        $id = $request['id'];
        $is_active = $request['is_active'];
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $middlename = $request['middlename'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $gender = $request['gender'];
        $address = $request['address'];
        $email = $request['email'];
        $mobile = $request['mobile'];


        if ($id == null) {
            // If the script is modified suspiciously
            return 'Error Occured. Please Reload This Page.';
        }

        $user = User::findorfail($id);


        // Check email availability
        if ($email != $user->email) {
            // check email is existing
            $email_check = User::where('email', $email)->first();

            if ($email_check == True) {
                return redirect()->route('get_edit_student', $user->user_id)->with('error', 'Email already in use.');
            }
        }
        if (Auth::user()->id == $id) {
            $is_active = 1;
        }

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->middlename = $middlename;
        $user->birthday = $birthday;
        $user->gender = $gender;
        $user->address = $address;
        $user->email = $email;
        $user->mobile = $mobile;
        $user->is_active = $is_active;


        $user->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Update Student - ' . ucwords($user->firstname);
        $log->save();


        return redirect()->route('get_all_students')->with('warning', 'Update Details for: ' . ucwords($firstname));
    }


    public function getDeleteStudent($id)
    {
        $user = User::findorfail($id);
        $delete = $user->firstname;
        $user->delete();
        
        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Delete Student - ' . $delete;
        $log->save();

        return redirect()->back()->with('danger', 'Student Deleted');
    }


    public function getSectionsPerLevel($id = null)
    {
        $sections = Section::whereLevel($id)->get();
        $grade_level = GradeLevel::findorfail($id);
        return view('admin.users.view-sections-per-level', ['sections' => $sections, 'grade_level' => $grade_level]);
    }


    public function getStudentsPerSection($id = null){
     
        $section = Section::findorfail($id);
        $students = StudentInfo::where('section_id', $id)->get();
        return view('admin.users.view-students-per-section', ['students' => $students, 'section' => $section]);
                       
    }







    // ------------------SECTION--------------------

    public function getAddSection()
    {
        $levels = GradeLevel::all();
        return view('admin.users.add-section', ['levels' => $levels]);
    }

    public function postAddSection(Request $request)
    {
        /*
         * Input validation
         */
        $this->validate(request(), [
            'grade_level' => 'required',
            'name' => 'required'
        ]);

        $level = $request['grade_level'];
        $name = $request['name'];

        // grade level
        // $grade_level = GradeLevel::findorfail($level);

        $add = new Section();

        $add->level = $level;
        $add->name = $name;

        $add->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Add Section - '. $add->grade_level->name . ' ' . $add->name;
        $log->save();

        return redirect()->route('get_all_sections')->with('success', 'Successfully Added Section');
    }

    public function getAllSections()
    {
        $sections = Section::orderBy('level', 'asc')->orderBy('name', 'desc')->paginate(10);
        return view('admin.users.view-all-sections', ['sections' => $sections]);
    }

    public function showEditSection($id)
    {

        $section = Section::findorfail($id);
        $levels = GradeLevel::get();
        return view('admin.users.edit-section', ['section' => $section, 'levels' => $levels]);
    }

    public function postEditSection(Request $request)
    {

        $this->validate($request, [
            'grade_level' => 'required',
            'name' => 'required'
        ]);

        // assigning values to variables
        $level = $request['grade_level'];
        $name = $request['name'];
        $id = $request['id'];


        // If id is empty
        if (empty($id)) {
            return 'System encountered error. Please reload this page.';
        }

        $section = Section::findorfail($id);

        if (empty($section)) {
            // If id is not on database
            return abort(404);
        }

        $section->level = $level;
        $section->name = $name;


        $section->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Update Section - ' . $section->grade_level->name . $section->name;
        $log->save();

        return redirect()->route('get_all_sections')->with('info', 'Update Details for: ' . ucwords($section->grade_level->name) . ' ' . ucwords($name));
    }

    public function getDeleteSection($id)
    {
        $section = Section::findorfail($id);
        $delete = $section->name;
        $section->delete();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Delete Section - ' . $delete;
        $log->save();

        return redirect()->back()->with('danger', 'Teacher Deleted');
    }





    // ------------------SUBJECT--------------------


    public function getAllSubjects()
    {
        $subjects = Subject::orderBy('level', 'asc')->orderBy('title', 'asc')->paginate(10);;
        $grade_level = GradeLevel::all();
        return view('admin.users.view-all-subjects', ['subjects' => $subjects, 'grade_level' => $grade_level]);
    }

    public function getAddSubject()
    {
        $levels = GradeLevel::all();
        return view('admin.users.add-subject', ['levels' => $levels]);
    }

    public function postAddSubject(Request $request)
    {
        // Validation
        $this->validate(request(), [
            'grade_level' => 'required',
            'title' => 'required',
            'description' => 'required',
            'written_work' => 'required|numeric',
            'performance_task' => 'required|numeric',
            'exam' => 'required|numeric'
        ]);

        // Assigning variables
        $level = $request['grade_level'];
        $title = $request['title'];
        $description = $request['description'];
        $written_work = $request['written_work'];
        $performance_task = $request['performance_task'];
        $exam = $request['exam'];

        $total = $written_work + $performance_task + $exam;

        if ($total != 100) {
            return redirect()->route('get_add_subject')->with('error', 'Total Criterial Percentage Must be equal to 100')->withInput();
        }

        $add = new Subject();

        $add->level = $level;
        $add->title = $title;
        $add->description = $description;
        $add->written_work = $written_work;
        $add->performance_task = $performance_task;
        $add->exam = $exam;


        $add->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Add Subject - ' . $add->title;
        $log->save();

        return redirect()->route('get_all_subjects')->with('success', 'Successfully Added Subject' . ucwords($title));
    }


    public function showEditSubject($id)
    {


        $levels = GradeLevel::get();
        $subject = Subject::findorfail($id);
        return view('admin.users.edit-subject', ['levels' => $levels, 'subject' => $subject]);
    }

    public function postEditSubject(Request $request)
    {
        $this->validate(request(), [
            'grade_level' => 'required',
            'title' => 'required',
            'description' => 'required',
            'written_work' => 'required|numeric',
            'performance_task' => 'required|numeric',
            'exam' => 'required|numeric'
        ]);

        $id = $request['id'];
        $level = $request['grade_level'];
        $title = $request['title'];
        $description = $request['description'];
        $written_work = $request['written_work'];
        $performance_task = $request['performance_task'];
        $exam = $request['exam'];

        // If id is empty
        if (empty($id)) {
            return 'System encountered error. Please reload this page.';
        }

        $total = $written_work + $performance_task + $exam;

        if ($total != 100) {
            return redirect()->route('get_edit_subject', $id)->with('error', 'Total Criterial Percentage Must be equal to 100');
        }

        $subject = Subject::findorfail($id);

        if (empty($subject)) {
            // If id is not on database
            return abort(404);
        }

        $subject->level = $level;
        $subject->title = $title;
        $subject->description = $description;
        $subject->written_work = $written_work;
        $subject->performance_task = $performance_task;
        $subject->exam = $exam;

        $subject->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Update Subject - ' . $subject->title;
        $log->save();

        return redirect()->route('get_all_sections')->with('info', 'Update Details Successful!');
    }

    public function getDeleteSubject($id)
    {
        $subject = Subject::findorfail($id);
        $delete = $subject->title;
        $subject->delete();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Update Subject - ' . $delete;
        $log->save();
        
        return redirect()->back()->with('danger', 'Teacher Deleted');
    }




    // ------------------ASSIGN SUBJECT--------------------

    public function getAssignSubjectLevel($id = null)
    {
        $subjects = Subject::where('level', $id)->get();
        $teachers = User::where('role_id', 2)->where('is_active', 1)->get();
        $sections = Section::where('level', $id)->get();
        $level = GradeLevel::findorfail($id);

        if(empty($subjects)) {
            abort(404);
        }


        return view('admin.users.assign-subject-level', ['subjects' => $subjects, 'teachers' => $teachers, 'level' => $level, 'sections' => $sections]);
    }

    public function postAssignSubjectLevel(Request $request)
    {
        // validate input
        $this->validate($request, [
            'teacher' => 'required',
            'subject' => 'required',
            'section' => 'required'
            ]);

        
        $level = $request['level'];
        $teacher = $request['teacher'];
        $subject = $request['subject'];
        $section = $request['section'];



        $check_assigned_subject = SubjectAssign::where('teacher_id', $teacher)
                                    ->where('subject_id', $subject)
                                    ->where('section_id', $section)
                                    ->first();


        // check if the subject is assigned to same teacher
        if(count($check_assigned_subject) != 0) {
            return redirect()->route('assign_subject_level', $level)->with('info', 'The subject is already assigned to the teacher.');
        }


        // if the subject is already assigned to another teacher
        $check_assigned_subject2 = SubjectAssign::where('subject_id', $subject)
                                    ->where('section_id', $section)
                                    ->first();

        if(!empty($check_assigned_subject2)) {
            return redirect()->route('assign_subject_level', $level)->with('info', 'The subject is already assigned to another teacher.');
        }


        $assign = new SubjectAssign();
        $assign->teacher_id = $teacher;
        $assign->subject_id = $subject;
        $assign->section_id = $section;

        $assign->save();
        
        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Assigned '. $assign->teacher->firstname . ' to subject ' . $assign->subject->title . ' - ' . $assign->section->grade_level->name . '-' . ucwords($assign->section->name);
        $log->save();

        
        // $log = new ActivityLogs();
        // $log->user_id = Auth::user()->id;
        // $log->action = 'Add Student - ' . $add->firstname . ' - ' . $info->section->grade_level->name . '-' . ucwords($info->section->name);
        // $log->save();



        // if($assign->save()) {
        //     $log = new UserLog();
        //     $log->user_id = Auth::user()->id;
        //     $log->action = "Assigned Subject to Teacher";
        //     $log->save();

        //     return redirect()->route('assign_subject_level', $level)->with('success', 'Subject Successfully Assigned to Teacher.');
        // }

      // return redirect()->back()->with('notice', 'Error Occurred. Please reload the page.');

      return redirect()->route('get_assign_subject_level', $level)->with('success', 'Subject Successfully Assigned to Teacher.');
    }

    public function getAllAssignedSubjects()
    {

        $assigned = SubjectAssign::all();

        return view('admin.users.view-all-subject-assigned', ['assigned' => $assigned]);

    }




    // method use to modify the teacher of a subject assignement
    public function getEditAssignedSubject($id = null)
    {
        $sa = SubjectAssign::findorfail($id);
        $teachers = User::where('role_id', 2)->where('is_active', 1)->get();

        return view('admin.users.edit-assigned-subject', ['teachers' => $teachers, 'subjectassign' => $sa]);
    }



    // method to update subject assignment
    public function postEditAssignedSubject(Request $request)
    {

        $this->validate($request, [
            'teacher' => 'required'
        ]);

        $teacher = $request['teacher'];

        $sa = SubjectAssign::findorfail($request['id']);
        $sa->teacher_id = $teacher;
        $sa->save();


        // $log = new UserLog();
        // $log->user_id = Auth::user()->id;
        // $log->action = "Admin updated subject assignment";
        // $log->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Update '. $sa->teacher->firstname . ' to subject ' . $sa->subject->title . ' - ' . $sa->section->grade_level->name . '-' . ucwords($sa->section->name);
        $log->save();

        return redirect()->route('get_all_assigned_subjects')->with('success', 'Subject Assignment Updated!');
    }










    // ------------------QUARTER--------------------

    public function getSelectQuarter()
    {
        $quarter = Quarter::all();

        return view('admin.users.select-quarter', ['quarter' => $quarter]);
    }



    /*
     * selectActiveQuarter() use to select active quarter in school year
     */
    public function selectActiveQuarter($id = null)
    {
        $quarter = Quarter::findorfail($id);

        $quarter->status = 1;

        $quarter->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Activated Quareter';
        $log->save();

        // if($quarter->save()) {
        //     // Add user log for activating quarter
        //     $log = new UserLog();
        //     $log->user_id = Auth::user()->id;
        //     $log->action = 'Activated ' . ucwords($quarter->name) . ' quarter of ' . $check_school_year->from . ' - ' . $check_school_year->to . ' school year';
        //     $log->save();

        //     return redirect()->route('select_quarter');
        //   }

        return redirect()->route('get_select_quarter');
  
    }




    /*
     * finishSelectedQuarter() use to finsiehd selected quarter
     */
    public function finishSelectedQuarter($id = null)
    {

        // Check if there is an active school year 
      

        // if($id == 4) {
        //     $end_school_year = SchoolYear::where('status', 1)->where('finish', 0)->first();

        //     $end_school_year->status = 0;
        //     $end_school_year->finish = 1;

        //     $end_school_year->save();
        // }

        $quarter = Quarter::findorfail($id);

        $quarter->status = 0;
        $quarter->finish = 1;

        $quarter->save();

        // if($quarter->save()) {
        //     // Add user log for activating quarter
        //     $log = new UserLog();
        //     $log->user_id = Auth::user()->id;
        //     $log->action = 'Finished ' . ucwords($quarter->name) . ' quarter of ' . $check_school_year->from . ' - ' . $check_school_year->to . ' school year';
        //     $log->save();

        //     return redirect()->route('select_quarter');
        // }
            $log = new ActivityLogs();
            $log->user_id = Auth::user()->id;
            $log->action = 'Finished Quarter';
            $log->save();


        return redirect()->route('get_select_quarter');
    }



    // method use to reselect quarter
    public function adminReselectQuarter($id = null)
    {
        $quarter = Quarter::findorfail($id);

        $active_quarter = Quarter::whereStatus(1)->first();
        if(count($active_quarter) > 0) {
            $active_quarter->status = 0;
            $active_quarter->save();
        }

        $quarter->status = 1;
        $quarter->finish = 0;
        $quarter->save();

        // userlog
        // $log = new UserLog();
        // $log->user_id = Auth::user()->id;
        // $log->action = 'admin reselect quarter: ' . $quarter->name;
        // $log->save();

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Reselect Quarter';
        $log->save();

        return redirect()->route('get_select_quarter')->with('success', 'Quarter Reselected');
    }





    // ------------------SEMESTER--------------------

    public function getSelectSemester()
    {
        $semester = Semester::all();

        return view('admin.users.select-semester', ['semester' => $semester]);
    }

    public function adminReselectSemester($id = null)
    {
        $sem = Semester::findorfail($id);

        $active_sem = Semester::whereStatus(1)->first();
        if(count($active_sem) > 0) {
            $active_sem->status = 0;
            $active_sem->save();
        }

        $sem->status = 1;
        $sem->finish = 0;
        $sem->save();

        // $log = new UserLog();
        // $log->user_id = Auth::user()->id;
        // $log->action = 'admin reselect semester: ' . $sem->name;
        // $log->save();
        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Reselect Semester';
        $log->save();

        return redirect()->route('get_select_semester')->with('success', 'Semester Reselected');

    }



    // select active semester
    public function selectActiveSemester($id = null)
    {
        // Check if there is an active school year 

        $semester = Semester::findorfail($id);

        $semester->status = 1;

        $semester->save();

        // if($semester->save()) {
        //     // Add user log for activating quarter
        //     $log = new UserLog();
        //     $log->user_id = Auth::user()->id;
        //     $log->action = 'Activated ' . ucwords($semester->name) . ' semester of ' . $check_school_year->from . ' - ' . $check_school_year->to . ' school year';
        //     $log->save();

        //     return redirect()->route('select_semester');
        // }
        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Activated Semester';
        $log->save();

        return redirect()->route('get_select_semester');

    }


    // finish selected semester
    public function finishSelectedSemester($id = null)
    {


        $semester = Semester::findorfail($id);

        $semester->status = 0;
        $semester->finish = 1;

        $semester->save();

        // if($semester->save()) {
        //     // Add user log for activating quarter
        //     $log = new UserLog();
        //     $log->user_id = Auth::user()->id;
        //     $log->action = 'Finished ' . ucwords($semester->name) . ' quarter of ' . $check_school_year->from . ' - ' . $check_school_year->to . ' school year';
        //     $log->save();

        //     return redirect()->route('select_semester');
        // }

        $log = new ActivityLogs();
        $log->user_id = Auth::user()->id;
        $log->action = 'Finished Semester';
        $log->save();
        return redirect()->route('get_select_semester');
    }

    public function getViewActivityLogs()
    {
        $logs = ActivityLogs::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.view-activity-logs', ['logs' => $logs]);
    }


}
