<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\UserLog;
use App\GradeLevel;
use App\Subject;
use App\Section;
use App\SchoolYear;
use App\Quarter;
use App\Semester;
use App\StudentInfo;
use App\StudentImport;
use App\SubjectAssign;
use App\WrittenWorkScore;
use App\PerformanceTaskScore;
use App\ExamScore;
use App\WrittenWorkNumber;
use App\PerformanceTaskNumber;
use App\ExamScoreNumber;
use App\Avatar;

class StudentUsersController extends Controller
{
    //

    //Student Menu
    private function getLevel()
    {
        $section = StudentInfo::where('user_id', Auth::user()->id)->get()->first();
        $level = $section->section->grade_level->id;

        return $level;
    }

    public function getStudentDashboard()
    {

        // chekc if the student has info
        $level = $this->getLevel();
        $check_student_info = StudentInfo::where('user_id', Auth::user()->id)->first();
        $section = StudentInfo::where('user_id', Auth::user()->id)->get()->first();


        if (count($check_student_info) < 1) {
            return 'System is Initializing by admin.';
        }


        return view('student.student-dashboard', ['section' => $section, 'level' => $level]);
    }

    // method to view subject
    public function getStudentViewGrades($id = null)
    {
        $level = $this->getLevel();

        $std_info = StudentInfo::where('user_id', Auth::user()->id)->get()->first();
        $subjects = Subject::where('level', $id)->get();

        $section = Section::findorFail($std_info->section_id);

        $section_id = $section->id;

        $first_quarter = Quarter::findorfail(1);
        $second_quarter = Quarter::findorfail(2);
        $third_quarter = Quarter::findorfail(3);
        $fourth_quarter = Quarter::findorfail(4);

        $first_sem = Semester::findorfail(1);
        $second_sem = Semester::findorfail(2);



        $fqg = [];
        $sqg = [];
        $tqg = [];
        $foqg = [];
        $fsg = [];
        $ssg = [];

        if ($section->level <= 4) {

            // for first quarter
            if ($first_quarter->status == 1 || $first_quarter->finish == 1) {

                // compute grade here
                // get all raw scores and compute
                // get all written work in first quarter
                foreach ($subjects as $sub) {
                    // total subject total in first quarter\
                    $ww_scores_q1[] = [
                        'subject_id' => $sub->id,
                        'score' => WrittenWorkScore::where('quarter_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => WrittenWorkScore::where('quarter_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $pt_scores_q1[] = [
                        'subject_id' => $sub->id,
                        'score' => PerformanceTaskScore::where('quarter_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => PerformanceTaskScore::where('quarter_id', 1)
                            ->where('section_id', $section->id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $exam_scores_q1[] = [
                        'subject_id' => $sub->id,
                        'score' => ExamScore::where('quarter_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => ExamScore::where('quarter_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];
                }



                foreach ($subjects as $sub) {
                    $ww_percentage = 0;
                    $pt_percentage = 0;
                    $exam_percentage = 0;
                    $grade = 0;

                    foreach ($ww_scores_q1 as $ws) {
                        if ($sub->id == $ws['subject_id'] && $ws['score'] != 0) {
                            $ww_percentage = ($ws['score'] / $ws['total']) * 100;
                        }
                    }


                    foreach ($pt_scores_q1 as $pt) {
                        if ($sub->id == $pt['subject_id'] && $pt['score'] != 0) {
                            $pt_percentage = ($pt['score'] / $pt['total']) *  100;
                        }
                    }


                    foreach ($exam_scores_q1 as $es) {
                        if ($sub->id == $es['subject_id'] && $es['score'] != 0) {
                            $exam_percentage = ($es['score'] / $es['total']) * 100;
                        }
                    }



                    $grade = ($ww_percentage * ($sub->written_work / 100)) + ($pt_percentage * ($sub->performance_task / 100)) + ($exam_percentage * ($sub->exam / 100));



                    $fqg[] = [
                        'subject_id' => $sub->id,
                        'grade' => number_format($grade)
                    ];
                }
            } // end of first quarter


            //for second quarter
            if ($second_quarter->status == 1 || $second_quarter->finish == 1) {

                // compute grade here
                // get all raw scores and compute
                // get all written work in first quarter
                foreach ($subjects as $sub) {
                    // total subject total in first quarter\
                    $ww_scores_q2[] = [
                        'subject_id' => $sub->id,
                        'score' => WrittenWorkScore::where('quarter_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => WrittenWorkScore::where('quarter_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $pt_scores_q2[] = [
                        'subject_id' => $sub->id,
                        'score' => PerformanceTaskScore::where('quarter_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => PerformanceTaskScore::where('quarter_id', 2)
                            ->where('section_id', $section->id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $exam_scores_q2[] = [
                        'subject_id' => $sub->id,
                        'score' => ExamScore::where('quarter_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => ExamScore::where('quarter_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];
                }



                foreach ($subjects as $sub) {
                    $ww_percentage = 0;
                    $pt_percentage = 0;
                    $exam_percentage = 0;
                    $grade = 0;

                    foreach ($ww_scores_q2 as $ws) {
                        if ($sub->id == $ws['subject_id'] && $ws['score'] != 0) {
                            $ww_percentage = ($ws['score'] / $ws['total']) * 100;
                        }
                    }


                    foreach ($pt_scores_q2 as $pt) {
                        if ($sub->id == $pt['subject_id'] && $pt['score'] != 0) {
                            $pt_percentage = ($pt['score'] / $pt['total']) *  100;
                        }
                    }


                    foreach ($exam_scores_q2 as $es) {
                        if ($sub->id == $es['subject_id'] && $es['score'] != 0) {
                            $exam_percentage = ($es['score'] / $es['total']) * 100;
                        }
                    }



                    $grade = ($ww_percentage * ($sub->written_work / 100)) + ($pt_percentage * ($sub->performance_task / 100)) + ($exam_percentage * ($sub->exam / 100));



                    $sqg[] = [
                        'subject_id' => $sub->id,
                        'grade' => number_format($grade)
                    ];
                }
            } // end of second quarter


            //for third quarter
            if ($third_quarter->status == 1 || $third_quarter->finish == 1) {

                // compute grade here
                // get all raw scores and compute
                // get all written work in first quarter
                foreach ($subjects as $sub) {
                    // total subject total in first quarter\
                    $ww_scores_q3[] = [
                        'subject_id' => $sub->id,
                        'score' => WrittenWorkScore::where('quarter_id', 3)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => WrittenWorkScore::where('quarter_id', 3)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $pt_scores_q3[] = [
                        'subject_id' => $sub->id,
                        'score' => PerformanceTaskScore::where('quarter_id', 3)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => PerformanceTaskScore::where('quarter_id', 3)
                            ->where('section_id', $section->id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $exam_scores_q3[] = [
                        'subject_id' => $sub->id,
                        'score' => ExamScore::where('quarter_id', 3)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => ExamScore::where('quarter_id', 3)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];
                }



                foreach ($subjects as $sub) {
                    $ww_percentage = 0;
                    $pt_percentage = 0;
                    $exam_percentage = 0;
                    $grade = 0;

                    foreach ($ww_scores_q3 as $ws) {
                        if ($sub->id == $ws['subject_id'] && $ws['score'] != 0) {
                            $ww_percentage = ($ws['score'] / $ws['total']) * 100;
                        }
                    }


                    foreach ($pt_scores_q3 as $pt) {
                        if ($sub->id == $pt['subject_id'] && $pt['score'] != 0) {
                            $pt_percentage = ($pt['score'] / $pt['total']) *  100;
                        }
                    }


                    foreach ($exam_scores_q3 as $es) {
                        if ($sub->id == $es['subject_id'] && $es['score'] != 0) {
                            $exam_percentage = ($es['score'] / $es['total']) * 100;
                        }
                    }



                    $grade = ($ww_percentage * ($sub->written_work / 100)) + ($pt_percentage * ($sub->performance_task / 100)) + ($exam_percentage * ($sub->exam / 100));



                    $tqg[] = [
                        'subject_id' => $sub->id,
                        'grade' => number_format($grade)
                    ];
                }
            } // end of third quarter



            //for foruth quarter
            if ($fourth_quarter->status == 1 || $fourth_quarter->finish == 1) {

                // compute grade here
                // get all raw scores and compute
                // get all written work in first quarter
                foreach ($subjects as $sub) {
                    // total subject total in first quarter\
                    $ww_scores_q4[] = [
                        'subject_id' => $sub->id,
                        'score' => WrittenWorkScore::where('quarter_id', 4)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => WrittenWorkScore::where('quarter_id', 4)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $pt_scores_q4[] = [
                        'subject_id' => $sub->id,
                        'score' => PerformanceTaskScore::where('quarter_id', 4)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => PerformanceTaskScore::where('quarter_id', 4)
                            ->where('section_id', $section->id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $exam_scores_q4[] = [
                        'subject_id' => $sub->id,
                        'score' => ExamScore::where('quarter_id', 4)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => ExamScore::where('quarter_id', 4)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];
                }



                foreach ($subjects as $sub) {
                    $ww_percentage = 0;
                    $pt_percentage = 0;
                    $exam_percentage = 0;
                    $grade = 0;

                    foreach ($ww_scores_q4 as $ws) {
                        if ($sub->id == $ws['subject_id'] && $ws['score'] != 0) {
                            $ww_percentage = ($ws['score'] / $ws['total']) * 100;
                        }
                    }


                    foreach ($pt_scores_q4 as $pt) {
                        if ($sub->id == $pt['subject_id'] && $pt['score'] != 0) {
                            $pt_percentage = ($pt['score'] / $pt['total']) *  100;
                        }
                    }


                    foreach ($exam_scores_q4 as $es) {
                        if ($sub->id == $es['subject_id'] && $es['score'] != 0) {
                            $exam_percentage = ($es['score'] / $es['total']) * 100;
                        }
                    }



                    $grade = ($ww_percentage * ($sub->written_work / 100)) + ($pt_percentage * ($sub->performance_task / 100)) + ($exam_percentage * ($sub->exam / 100));



                    $foqg[] = [
                        'subject_id' => $sub->id,
                        'grade' => number_format($grade)
                    ];
                }
            } // end of fourth quarter

            return view('student.student-view-grades', ['level' => $level, 'section' => $section, 'subjects' => $subjects, 'fqg' => $fqg, 'sqg' => $sqg, 'tqg' => $tqg, 'foqg' => $foqg]);
        }
        else {
            //for first semester
            if ($first_sem->status == 1 || $first_sem->finish == 1) {

                // compute grade here
                // get all raw scores and compute
                // get all written work in first quarter
                foreach ($subjects as $sub) {
                    // total subject total in first quarter\
                    $ww_scores_s1[] = [
                        'subject_id' => $sub->id,
                        'score' => WrittenWorkScore::where('semester_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => WrittenWorkScore::where('semester_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $pt_scores_s1[] = [
                        'subject_id' => $sub->id,
                        'score' => PerformanceTaskScore::where('semester_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => PerformanceTaskScore::where('semester_id', 1)
                            ->where('section_id', $section->id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $exam_scores_s1[] = [
                        'subject_id' => $sub->id,
                        'score' => ExamScore::where('semester_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => ExamScore::where('semester_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];
                }



                foreach ($subjects as $sub) {
                    $ww_percentage = 0;
                    $pt_percentage = 0;
                    $exam_percentage = 0;
                    $grade = 0;

                    foreach ($ww_scores_s1 as $ws) {
                        if ($sub->id == $ws['subject_id'] && $ws['score'] != 0) {
                            $ww_percentage = ($ws['score'] / $ws['total']) * 100;
                        }
                    }


                    foreach ($pt_scores_s1 as $pt) {
                        if ($sub->id == $pt['subject_id'] && $pt['score'] != 0) {
                            $pt_percentage = ($pt['score'] / $pt['total']) *  100;
                        }
                    }


                    foreach ($exam_scores_s1 as $es) {
                        if ($sub->id == $es['subject_id'] && $es['score'] != 0) {
                            $exam_percentage = ($es['score'] / $es['total']) * 100;
                        }
                    }



                    $grade = ($ww_percentage * ($sub->written_work / 100)) + ($pt_percentage * ($sub->performance_task / 100)) + ($exam_percentage * ($sub->exam / 100));



                    $fsg[] = [
                        'subject_id' => $sub->id,
                        'grade' => number_format($grade)
                    ];
                }
            } // end of first semester


            //for second semester
            if ($second_sem->status == 1 || $second_sem->finish == 1) {

                // compute grade here
                // get all raw scores and compute
                // get all written work in first quarter
                foreach ($subjects as $sub) {
                    // total subject total in first quarter\
                    $ww_scores_s2[] = [
                        'subject_id' => $sub->id,
                        'score' => WrittenWorkScore::where('semester_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => WrittenWorkScore::where('semester_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $pt_scores_s2[] = [
                        'subject_id' => $sub->id,
                        'score' => PerformanceTaskScore::where('semester_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => PerformanceTaskScore::where('semester_id', 2)
                            ->where('section_id', $section->id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];

                    $exam_scores_s2[] = [
                        'subject_id' => $sub->id,
                        'score' => ExamScore::where('semester_id', 2)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('score'),
                        'total' => ExamScore::where('semester_id', 1)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $sub->id)
                            ->where('student_id', $std_info->id)
                            ->sum('total')
                    ];
                }



                foreach ($subjects as $sub) {
                    $ww_percentage = 0;
                    $pt_percentage = 0;
                    $exam_percentage = 0;
                    $grade = 0;

                    foreach ($ww_scores_s2 as $ws) {
                        if ($sub->id == $ws['subject_id'] && $ws['score'] != 0) {
                            $ww_percentage = ($ws['score'] / $ws['total']) * 100;
                        }
                    }


                    foreach ($pt_scores_s2 as $pt) {
                        if ($sub->id == $pt['subject_id'] && $pt['score'] != 0) {
                            $pt_percentage = ($pt['score'] / $pt['total']) *  100;
                        }
                    }


                    foreach ($exam_scores_s2 as $es) {
                        if ($sub->id == $es['subject_id'] && $es['score'] != 0) {
                            $exam_percentage = ($es['score'] / $es['total']) * 100;
                        }
                    }



                    $grade = ($ww_percentage * ($sub->written_work / 100)) + ($pt_percentage * ($sub->performance_task / 100)) + ($exam_percentage * ($sub->exam / 100));



                    $ssg[] = [
                        'subject_id' => $sub->id,
                        'grade' => number_format($grade)
                    ];
                }
            } // end of first semester
return view('student.student-view-grades2', ['level' => $level, 'section' => $section, 'subjects' => $subjects, 'fsg' => $fsg, 'ssg' => $ssg]);
        }
    }




    public static function getGrade($i)
    {
        switch ($i) {
            case $i >= 0 && $i <= 3.99:
                return 60;
                break;

            case $i >= 4 && $i <= 7.99:
                return 61;
                break;

            case $i >= 8 && $i <= 11.99:
                return 62;
                break;

            case $i >= 12 && $i <= 15.99:
                return 63;
                break;

            case $i >= 16 && $i <= 19.99:
                return 64;
                break;

            case $i >= 20 && $i <= 23.99:
                return 65;
                break;

            case $i >= 24 && $i <= 27.99:
                return 66;
                break;

            case $i >= 28 && $i <= 31.99:
                return 67;
                break;

            case $i >= 32 && $i <= 35.99:
                return 68;
                break;

            case $i >= 36 && $i <= 39.99:
                return 69;
                break;

            case $i >= 40 && $i <= 43.99:
                return 70;
                break;

            case $i >= 44 && $i <= 47.99:
                return 71;
                break;

            case $i >= 48 && $i <= 51.99:
                return 72;
                break;

            case $i >= 52 && $i <= 55.99:
                return 73;
                break;

            case $i >= 56 && $i <= 59.99:
                return 74;
                break;

            case $i >= 60 && $i <= 61.59:
                return 75;
                break;

            case $i >= 61.6 && $i <= 63.19:
                return 76;
                break;

            case $i >= 63.2 && $i <= 64.79:
                return 77;
                break;

            case $i >= 64.8 && $i <= 66.39:
                return 78;
                break;

            case $i >= 66.4 && $i <= 67.99:
                return 79;
                break;

            case $i >= 68 && $i <= 69.59:
                return 80;
                break;

            case $i >= 69.6 && $i <= 71.19:
                return 81;
                break;

            case $i >= 71.2 && $i <= 72.79:
                return 82;
                break;

            case $i >= 72.8 && $i <= 74.39:
                return 83;
                break;

            case $i >= 74.4 && $i <= 75.99:
                return 84;
                break;

            case $i >= 76 && $i <= 77.59:
                return 85;
                break;

            case $i >= 77.6 && $i <= 79.19:
                return 86;
                break;

            case $i >= 79.2 && $i <= 80.79:
                return 87;
                break;

            case $i >= 80.8 && $i <= 82.39:
                return 88;
                break;

            case $i >= 82.4 && $i <= 83.99:
                return 89;
                break;

            case $i >= 84 && $i <= 85.59:
                return 90;
                break;

            case $i >= 85.6 && $i <= 87.19:
                return 91;
                break;

            case $i >= 87.2 && $i <= 88.79:
                return 92;
                break;

            case $i >= 88.8 && $i <= 90.39:
                return 93;
                break;

            case $i >= 90.4 && $i <= 91.99:
                return 94;
                break;

            case $i >= 92 && $i <= 93.59:
                return 95;
                break;

            case $i >= 93.6 && $i <= 95.19:
                return 96;
                break;

            case $i >= 95.2 && $i <= 96.79:
                return 97;
                break;

            case $i >= 96.8 && $i <= 98.39:
                return 98;
                break;

            case $i >= 98.4 && $i <= 99.9:
                return 99;
                break;

            case 100:
                return 100;
                break;

            default:
                return $i;
                break;
        }
    }
}
