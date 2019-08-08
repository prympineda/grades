<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin_dashboard');
        }
        if (Auth::user()->role_id == 2) {
            return redirect()->route('teacher_dashboard');
        } else {
            return redirect()->route('student_dashboard');
        }
    }
    return view('layouts.landing_page');
})->name('landing_page');

Route::get('admin/login', function () {
    return view('login.admin-logins');
})->name('admin_login');


Route::get('teacher/login', function () {
    return view('login.teacher-logins');
})->name('teacher_login');

Route::get('student/login', function () {
    return view('login.student-logins');
})->name('student_login');


Route::post('login', [
    'uses' => 'AccessController@postLogin',
    'as' => 'post_login'
]);

Route::get('logout', [
    'uses' => 'AccessController@getLogout',
    'as' => 'get_logout'
]);


Route::get('login', function () {
    return redirect()->route('landing_page');
});


// ------------------------Admin Routes------------------------


Route::group(['middleware' => 'preventBackHistory'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'Admin']], function () {


        // Route::get('/', [
        //     'uses' => 'AdminUsersController@getuserscount',
        //     'as' => 'get_users_count'
        // ]);
        Route::get('/', function () {
            return redirect()->route('admin_dashboard');
        });

        Route::get('/dashboard', [
            'uses' => 'AdminUsersController@getAdminDashboard',
            'as' => 'admin_dashboard'
        ]);


        Route::get('/getalladmin', [
            'uses' => 'AdminUsersController@getAllAdmins',
            'as' => 'get_all_admins'
        ]);

        Route::get('add-admin', [
            'uses' => 'AdminUsersController@getAddAdmin',
            'as' => 'get_add_admin'
        ]);

        Route::post('add-admin', [
            'uses' => 'AdminUsersController@postAddAdmin',
            'as' => 'post_add_admin'
        ]);

        Route::get('edit-admin/{id}', [
            'uses' => 'AdminUsersController@showEditAdmin',
            'as' => 'get_edit_admin'
        ]);

        Route::post('edit-admin', [
            'uses' => 'AdminUsersController@postEditAdmin',
            'as' => 'post_edit_admin'
        ]);

        Route::get('get/delete/admin/{id}', [
            'uses' => 'AdminUsersController@getDeleteAdmin',
            'as' => 'get_delete_admin'
        ]);

        Route::get('get/delete/admin', function () {
            abort(404);
        });



        // --------------------Teacher Routes----------------

        Route::get('/getallteachers', [
            'uses' => 'AdminUsersController@getAllTeachers',
            'as' => 'get_all_teachers'
        ]);

        Route::post('add-teacher', [
            'uses' => 'AdminUsersController@postAddTeacher',
            'as' => 'post_add_teacher'
        ]);

        Route::get('add-teacher', [
            'uses' => 'AdminUsersController@getAddTeacher',
            'as' => 'get_add_teacher'
        ]);

        Route::get('edit-teacher/{id}', [
            'uses' => 'AdminUsersController@showEditTeacher',
            'as' => 'get_edit_teacher'
        ]);

        Route::post('edit-teacher', [
            'uses' => 'AdminUsersController@postEditTeacher',
            'as' => 'post_edit_teacher'
        ]);

        Route::get('get/delete/teacher/{id}', [
            'uses' => 'AdminUsersController@getDeleteTeacher',
            'as' => 'get_delete_teacher'
        ]);

        Route::get('get/delete/teacher', function () {
            abort(404);
        });


        // ----------------Student Routes----------------

        Route::get('view-all-students', [
            'uses' => 'AdminUsersController@getAllStudents',
            'as' => 'get_all_students'
        ]);

        Route::post('add-student', [
            'uses' => 'AdminUsersController@postAddStudent',
            'as' => 'post_add_student'
        ]);

        Route::get('add-student', [
            'uses' => 'AdminUsersController@getAddStudent',
            'as' => 'get_add_student'
        ]);

        Route::get('edit-student/{id}', [
            'uses' => 'AdminUsersController@showEditStudent',
            'as' => 'get_edit_student'
        ]);

        Route::post('edit-student', [
            'uses' => 'AdminUsersController@postEditStudent',
            'as' => 'post_edit_student'
        ]);

        Route::get('get/delete/student/{id}', [
            'uses' => 'AdminUsersController@getDeleteStudent',
            'as' => 'get_delete_student'
        ]);

        Route::get('get/delete/student', function () {
            abort(404);
        });

        Route::get('get/sections/per-level/{id}', [
            'uses' => 'AdminUsersController@getSectionsPerLevel',
            'as' => 'get_sections_per_level'
        ]);

        Route::get('get/students/per-section/{id}', [
            'uses' => 'AdminUsersController@getStudentsPerSection',
            'as' => 'get_students_per_section'
        ]);


        // ----------------Section Routes----------------

        Route::get('all-sections', [
            'uses' => 'AdminUsersController@getAllSections',
            'as' => 'get_all_sections'
        ]);

        Route::get('add-section', [
            'uses' => 'AdminUsersController@getAddSection',
            'as' => 'get_add_section'
        ]);

        Route::post('add-section', [
            'uses' => 'AdminUsersController@postAddSection',
            'as' => 'post_add_section'
        ]);

        Route::get('edit-section/{id}', [
            'uses' => 'AdminUsersController@showEditSection',
            'as' => 'get_edit_section'
        ]);

        Route::post('edit-section', [
            'uses' => 'AdminUsersController@postEditSection',
            'as' => 'post_edit_section'
        ]);

        Route::get('get/delete/section/{id}', [
            'uses' => 'AdminUsersController@getDeleteSection',
            'as' => 'get_delete_section'
        ]);

        Route::get('get/delete/section', function () {
            abort(404);
        });



        // ----------------Subject Routes----------------

        Route::get('all-subjects', [
            'uses' => 'AdminUsersController@getAllSubjects',
            'as' => 'get_all_subjects'
        ]);

        Route::get('add-subject', [
            'uses' => 'AdminUsersController@getAddSubject',
            'as' => 'get_add_subject'
        ]);

        Route::post('add-subject', [
            'uses' => 'AdminUsersController@postAddSubject',
            'as' => 'post_add_subject'
        ]);

        Route::get('edit-subject/{id}', [
            'uses' => 'AdminUsersController@showEditSubject',
            'as' => 'get_edit_subject'
        ]);

        Route::post('edit-subject', [
            'uses' => 'AdminUsersController@postEditSubject',
            'as' => 'post_edit_subject'
        ]);

        Route::get('get/delete/subject/{id}', [
            'uses' => 'AdminUsersController@getDeleteSubject',
            'as' => 'get_delete_subject'
        ]);

        Route::get('get/delete/subject', function () {
            abort(404);
        });



        // ----------------Subject Routes----------------

        Route::get('assign/subject/level/{id}', [
            'uses' => 'AdminUsersController@getAssignSubjectLevel',
            'as' => 'get_assign_subject_level'
        ]);

        Route::get('assign/subject/level', function () {
            abort(404);
        });

        Route::post('assign/subject/level', [
            'uses' => 'AdminUsersController@postAssignSubjectLevel',
            'as' => 'post_assign_subject_level'
        ]);

        // route to view all assigned subjects to teachers
        Route::get('view-all/assigned/subject', [
            'uses' => 'AdminUsersController@getAllAssignedSubjects',
            'as' => 'get_all_assigned_subjects'
        ]);


        // route to update view subject assign
        Route::get('edit/assigned/subject/{id}', [
            'uses' => 'AdminUsersController@getEditAssignedSubject',
            'as' => 'get_edit_assigned_subject'
        ]);

        Route::post('edit/assigned/subject', [
            'uses' => 'AdminUsersController@postEditAssignedSubject',
            'as' => 'post_edit_assigned_subject'
        ]);



        // ----------------Quarter Routes----------------

        Route::get('select-quarter', [
            'uses' => 'AdminUsersController@getSelectQuarter',
            'as' => 'get_select_quarter'
        ]);

        Route::get('select-active-quarter/{id}', [
            'uses' => 'AdminUsersController@selectActiveQuarter',
            'as' => 'select_active_quarter'
        ]);

        /*
         * route to finish selected quarter
         */
        Route::get('finish-selected-quarter/{id}', [
            'uses' => 'AdminUsersController@finishSelectedQuarter',
            'as' => 'finish_selected_quarter'
        ]);


        // reselect quarter
        Route::get('reselect-quarter/{id}', [
            'uses' => 'AdminUsersController@adminReselectQuarter',
            'as' => 'admin_reselect_quater'
        ]);



        // ----------------Semester Routes----------------

        Route::get('select-semester', [
            'uses' => 'AdminUsersController@getSelectSemester',
            'as' => 'get_select_semester'
        ]);

        Route::get('reselect-semester/{id}', [
            'uses' => 'AdminUsersController@adminReselectSemester',
            'as' => 'admin_reselect_semester'
        ]);

        Route::get('select-active-semester/{id}', [
            'uses' => 'AdminUsersController@selectActiveSemester',
            'as' => 'select_active_semester'
        ]);

        // route to finish selected semester
        Route::get('finish-selected-semester/{id}', [
            'uses' => 'AdminUsersController@finishSelectedSemester',
            'as' => 'finish_selected_semester'
        ]);


        // ----------------Semester Routes----------------
        Route::get('view-activity_logs', [
            'uses' => 'AdminUsersController@getViewActivityLogs',
            'as' => 'get_view_activity_logs'
        ]);
    });
});




// ------------------------Teacher Routes------------------------

Route::group(['middleware' => 'preventBackHistory'], function () {
    Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'Teacher']], function () {

        Route::get('/', function () {
            return redirect()->route('teacher_dashboard');
        });

        Route::get('/dashboard', [
            'uses' => 'TeacherUsersController@getTeacherDashboard',
            'as' => 'teacher_dashboard'
        ]);

        Route::get('/get-section-per-level/{id}', [
            'uses' => 'TeacherUsersController@getSectionPerLevel',
            'as' => 'get_section_per_level'
        ]);

        Route::get('/view-students-per-section/{section_id}/subject/{subject_id}', [
            'uses' => 'TeacherUsersController@getViewStudentsPerSection',
            'as' => 'get_view_students_per_section'
        ]);

        // route to add written work in record of the students
        Route::get('add/written-work/section/{section_id}/subject/{subject_id}/get', [
            'uses' => 'TeacherUsersController@addWrittenWorkScore',
            'as' => 'add_written_work_score'
        ]);

        // route to add writen work post
        Route::post('add/written-work', [
            'uses' => 'TeacherUsersController@postAddWrittenWork',
            'as' => 'post_add_written_work_score'
        ]);
        Route::get('add/written-work', function () {
            abort(404);
        });


        // route to view written work scores
        Route::get('view/written-work/score/{sectionid}/{subjectid}/get', [
            'uses' => 'TeacherUsersController@viewWrittenWorkScore',
            'as' => 'view_written_work_score'
        ]);


        // route to update individual score of student in written work
        Route::get('update/written-work/score/{id}/{user_id}', [
            'uses' => 'TeacherUsersController@updateWrittenWorkScore',
            'as' => 'update_written_work_score'
        ]);

        // route to add performance task in record of the students
        Route::get('add/performance-task/section/{section_id}/subject/{subject_id}/get', [
            'uses' => 'TeacherUsersController@addPerformanceTask',
            'as' => 'add_performance_task_score'
        ]);


        // route to post update writen work score
        Route::post('update/written-work/score', [
            'uses' => 'TeacherUsersController@postUpdateWrittenWorkScore',
            'as' => 'post_update_written_work_score'
        ]);


        // route to add performance task
        Route::post('add/performance-task', [
            'uses' => 'TeacherUsersController@postAddPerformanceTask',
            'as' => 'post_add_performance_task'
        ]);


        // route update performance task
        Route::get('update/performance-task/score/{section_id}/{subject_id}/get', [
            'uses' => 'TeacherUsersController@updatePerformanceTaskScore',
            'as' => 'update_performance_task_score'
        ]);


        // route post update performance task
        Route::post('update/performance-task/score', [
            'uses' => 'TeacherUsersController@postUpdatePerformanceTaskScore',
            'as' => 'post_update_performance_task_score'
        ]);

        // route to view performance task scores
        Route::get('view/performance-task/score/{section_id}/{subject_id}/get', [
            'uses' => 'TeacherUsersController@viewPerformanceTask',
            'as' => 'view_performance_task_score'
        ]);


        // route to add exam in record of the students
        Route::get('add/exam/section/{section_id}/subject/{subject_id}/get', [
            'uses' => 'TeacherUsersController@addExam',
            'as' => 'add_exam_score'
        ]);


        // route to add exam
        Route::post('add/exam', [
            'uses' => 'TeacherUsersController@postAddExam',
            'as' => 'post_add_exam_score'
        ]);

        // route to view exam scores
        Route::get('view/exam/score/{sectionid}/{subjectid}/get', [
            'uses' => 'TeacherUsersController@viewExamScore',
            'as' => 'view_exam_score'
        ]);

        // route to edit exam score
        Route::get('update/exam/score/{id}/{user_id}/', [
            'uses' => 'TeacherUsersController@updateExamScore',
            'as' => 'update_exam_score'
        ]);

        // route to POST edit exam score
        Route::post('update/exam/score', [
            'uses' => 'TeacherUsersController@postUpdateExamScore',
            'as' => 'post_update_exam_score'
        ]);
    });
});
