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
use phpDocumentor\Reflection\Types\Null_;
use App\WrittenWorkNumber;

class TeacherUsersController extends Controller
{
	//
	public function __construct()
	{ 

	}


	public function getTeacherDashboard()
	{
		// for menu in teacher
		// $students = $this->getMyStudents();
		// $grade = SubjectAssign::where('section_id.section.grade_level.id', 1)->get();


		//return view('teacher.teacher-dashboard', ['students' => $students, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
		$students = SubjectAssign::where('teacher_id', Auth::user()->id)
		->get();

		$grade7 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 1)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade8 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 2)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade9 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 3)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade10 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 4)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade11 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 5)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade12 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 6)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		return view('layouts.teacher', ['students' => $students, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}


	public function getSectionPerLevel($id)
	{

		 $level = GradeLevel::findorFail($id);
		$assigned = DB::table('subject_assigns')
			->join('subjects', function ($join) use($id) {
				$join->on('subject_assigns.subject_id', '=', 'subjects.id')
				->where('subject_assigns.teacher_id', Auth::user()->id)
				->where('subjects.level', '=', $id);	
			})
			->join('sections', function ($join) use($id){
				$join->on('subject_assigns.section_id', '=', 'sections.id')
				->where('sections.level', '=', $id);	
			})
			->get();

			

		$students = SubjectAssign::where('teacher_id', Auth::user()->id)
		->get();

		$grade7 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 1)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade8 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 2)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade9 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 3)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade10 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 4)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade11 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 5)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade12 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 6)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		

		return view('teacher.view-section-per-level', ['assigned' => $assigned, 'level' => $level, 'students' => $students, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);

	}

	public function getViewStudentsPerSection($section_id, $subject_id){

		$subject = Subject::findorFail($subject_id);
		$section = Section::findorfail($section_id);
		$studs = StudentInfo::where('section_id', $section_id)->get();


		// Teacher's Menu
		$students = SubjectAssign::where('teacher_id', Auth::user()->id)
		->get();

		$grade7 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 1)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade8 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 2)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade9 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 3)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade10 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 4)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade11 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 5)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade12 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 6)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		

		return view('teacher.view-students-per-section', ['students' => $students, 'subject' => $subject, 'studs' => $studs, 'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}

	public function addWrittenWorkScore($section_id = null, $subject_id = null)
    {

        // check if there is selected sem & quarter
        $quarter = Quarter::whereStatus(1)->first();
		$sem = Semester::whereStatus(1)->first();
	
		
        // for menu in teacher
		$students = SubjectAssign::where('teacher_id', Auth::user()->id)
		->get();

		$grade7 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 1)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade8 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 2)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade9 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 3)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade10 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 4)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade11 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 5)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade12 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 6)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

       

        if(count($quarter) == 0 || count($sem) == 0) {
            return 'no selected semester or quarter';
        }

        $section = Section::findorfail($section_id);
        $subject = Subject::findorfail($subject_id);
       


       
        // select students
        $studs = StudentInfo::where('section_id', $section_id)
                                ->get();

        // return $students;
        
		return view('teacher.add-written-work', ['students' => $students, 'subject' => $subject, 'studs' => $studs, 'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}
	
	 // method use to add written work post
	 public function postAddWrittenWork(Request $request)
	 {

		// Teacher's Menu
		$students = SubjectAssign::where('teacher_id', Auth::user()->id)
		->get();

		$grade7 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 1)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade8 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 2)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade9 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 3)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade10 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 4)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade11 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 5)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();

		$grade12 = DB::table('subject_assigns')
			->join('sections', function ($join) {
				$join->on('subject_assigns.section_id', '=', 'sections.id')
					->where('sections.level', '=', 6)
					->where('subject_assigns.teacher_id', Auth::user()->id);
			})
			->get();


		 $this->validate($request, [
			 'total' => 'required|numeric'
		 ]);
 
		 // total number of score
		 $total = $request['total'];
		 $section_id = $request['section_id'];
		 $subject_id = $request['subject_id'];
 
		 // active quarter
		 $active_quarter = Quarter::whereStatus(1)->first();
 
		 // active semester
		 $active_sem = Semester::whereStatus(1)->first();
 
		 // section
		 $section = Section::findorfail($section_id);
 
		 // subject
		 $subject = Subject::findorfail($subject_id);
 
 
 
		 // get the last number of  the written work
		 // for grade 7 to 10
		 if($section->grade_level->id == 1 || $section->grade_level->id == 2 || $section->grade_level->id == 3 || $section->grade_level->id == 4) {
		  
			 $wwn = WrittenWorkNumber::where('quarter_id', $active_quarter->id)
									 ->where('section_id', $section->id)
									 ->where('subject_id', $subject->id)
									 ->first();
 
		 }
		 // for grade 11 and 12
		 else {
			 $wwn = WrittenWorkNumber::where('semester_id', $active_sem->id)
						 ->where('section_id', $section->id)
						 ->where('subject_id', $subject->id)
						 ->first();
		 }
 
 
		 
		 if(count($wwn) == 0) {
			 $wwn = new WrittenWorkNumber();
			 if($section->grade_level->id == 5 || $section->grade_level->id == 6) {
				 $wwn->semester_id = $active_sem->id;
			 }
			 else {
				 $wwn->quarter_id = $active_quarter->id;
			 }
			 $wwn->section_id = $section->id;
			 $wwn->subject_id = $subject->id;
			 $wwn->total = $total;
			 $wwn->number = 1;
			 $wwn->save();
			 
			 
		 }
		 else {
 
			 // increase the number of the written work number
			 $wwn->number = $wwn->number + 1;
			 $wwn->total = $wwn->total + $total;
			 $wwn->save();
		 }
		 // set array for score together with student id of the student
		 foreach($section->students as $std) {
 
			 if($total < $request[$std->user_id]) {
				 $wwn->number = $wwn->number -  1;
				 $wwn->total = $wwn->total - $total;
				 $wwn->save();
 
				 return redirect()->back()->with('error', 'The Scores Must NOT Be Greater Than The Total.');
			 }
 
			 if($section->grade_level->id == 5 || $section->grade_level->id == 6) {
 
				 $score[] = [
					 'semester_id' => $active_sem->id,
					 'section_id' => $section->id,
					 'subject_id' => $subject->id,
					 'student_id' => $std->id,
					 'written_work_number' => $wwn->number,
					 'written_work_id' => $wwn->id,
					 'score' => $request[$std->user_id],
					 'total' => $total
 
				 ];
			 }
			 else {
 
				 $score[] = [
					 'quarter_id' => $active_quarter->id,
					 'section_id' => $section->id,
					 'subject_id' => $subject->id,
					 'student_id' => $std->id,
					 'written_work_number' => $wwn->number,
					 'written_work_id' => $wwn->id,
					 'score' => $request[$std->user_id],
					 'total' => $total
 
				 ];
			 }
		 }
 
		 // insert score in written work scores table
		 DB::table('written_work_scores')->insert($score);
 
 
		 // user log 
		 $log = new ActivityLogs();
		 $log->user_id = Auth::user()->id;
		 $log->action = 'Added Written Work # ' . $wwn->number . ' on ' . $section->grade_level->name . ' - ' . $section->name;
		 $log->save();
 
		 return redirect()->back()->with('success', 'Written Work #' . $wwn->number . ' Sucessfully Saved!');
		 
		 return 'error in post add written work';
		 
 
	 }
	
}
