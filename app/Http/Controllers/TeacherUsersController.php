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
use App\WrittenWorkScore;
use App\PerformanceTaskNumber;
use App\PerformanceTaskScore;
use App\ExamScore;
use App\ExamScoreNumber;

class TeacherUsersController extends Controller
{
	//
	public function __construct()
	{ }


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
			->join('subjects', function ($join) use ($id) {
				$join->on('subject_assigns.subject_id', '=', 'subjects.id')
					->where('subject_assigns.teacher_id', Auth::user()->id)
					->where('subjects.level', '=', $id);
			})
			->join('sections', function ($join) use ($id) {
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

	public function getViewStudentsPerSection($section_id, $subject_id)
	{

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



		if (count($quarter) == 0 || count($sem) == 0) {
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
		if ($section->grade_level->id == 1 || $section->grade_level->id == 2 || $section->grade_level->id == 3 || $section->grade_level->id == 4) {

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



		if (count($wwn) == 0) {
			$wwn = new WrittenWorkNumber();
			if ($section->grade_level->id == 5 || $section->grade_level->id == 6) {
				$wwn->semester_id = $active_sem->id;
			} else {
				$wwn->quarter_id = $active_quarter->id;
			}
			$wwn->section_id = $section->id;
			$wwn->subject_id = $subject->id;
			$wwn->total = $total;
			$wwn->number = 1;
			$wwn->save();
		} else {

			// increase the number of the written work number
			$wwn->number = $wwn->number + 1;
			$wwn->total = $wwn->total + $total;
			$wwn->save();
		}
		// set array for score together with student id of the student
		foreach ($section->students as $std) {

			if ($total < $request[$std->user_id]) {
				$wwn->number = $wwn->number -  1;
				$wwn->total = $wwn->total - $total;
				$wwn->save();

				return redirect()->back()->with('error', 'The Scores Must NOT Be Greater Than The Total.');
			}

			if ($section->grade_level->id == 5 || $section->grade_level->id == 6) {

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
			} else {

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

	public function viewWrittenWorkScore($sectionid = null, $subjectid = null)
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



		$quarter = Quarter::whereStatus(1)->first();
		$semester = Semester::whereStatus(1)->first();

		$section = Section::findorfail($sectionid);
		$subject = Subject::findorfail($subjectid);


		if ($quarter == null || $semester == null) {
			return 'system is initializing by admin';
		}

		// check how many written works has taken
		// check also if junior or senior high
		if ($section->grade_level->id == 1 || $section->grade_level->id == 2 || $section->grade_level->id == 3 || $section->grade_level->id == 4) {

			$ww_number = WrittenWorkNumber::where('quarter_id', $quarter->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		} else {
			$ww_number = WrittenWorkNumber::where('semester_id', $semester->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		}


		if (count($ww_number) == 0) {
			return view('teacher.no-score-written-work', ['students' => $students, 'subject' => $subject,  'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
		}


		// get all scores in the quarter/sem using the id of the written work
		$scores = WrittenWorkScore::where('written_work_id', $ww_number->id)->get();



		return view('teacher.view-written-work-scores', ['scores' => $scores, 'ww_number' => $ww_number, 'students' => $students, 'subject' => $subject,  'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}



	// method to update written work score
	public function updateWrittenWorkScore($id = null, $user_id = null)
	{
		$score = WrittenWorkScore::findorfail($id);
		$student = User::where('id', $user_id)->first();

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

		return view('teacher.teacher-update-written-work-score', ['score' => $score, 'student' => $student, 'students' => $students, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}



	// method use to updat the score of the students
	public function postUpdateWrittenWorkScore(Request $request)
	{
		$this->validate($request, [
			'score' => 'required|numeric'
		]);

		$score = $request['score'];
		$total = $request['total'];

		$wws = WrittenWorkScore::findorfail($request['id']);
		$wws->score = $score;
		$wws->save();

		// log
		$log = new ActivityLogs();
		$log->user_id = Auth::user()->id;
		$log->action = 'Update Written Work Score';
		$log->save();


		return redirect()->route('view_written_work_score', ['sectionid' => $wws->section_id, 'subjectid' => $wws->subject_id])->with('success', 'Score Updated!');
	}


	// method use to add performance task score
	public function addPerformanceTask($section_id = null, $subject_id = null)
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


		// check if there is selected sem & quarter
		$quarter = Quarter::whereStatus(1)->first();
		$sem = Semester::whereStatus(1)->first();



		if (count($quarter) == 0 || count($sem) == 0) {
			return 'no selected semester or quarter';
		}

		$section = Section::findorfail($section_id);
		$subject = Subject::findorfail($subject_id);


		// active school year

		// select students
		$studs = StudentInfo::where('section_id', $section_id)
			->get();

		// return $students;

		return view('teacher.add-performance-task', ['students' => $students, 'studs' => $studs, 'section' => $section, 'subject' => $subject, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}


	// method use to add performance task
	public function postAddPerformanceTask(Request $request)
	{

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
		if ($section->grade_level->id == 1 || $section->grade_level->id == 2 || $section->grade_level->id == 3 || $section->grade_level->id == 4) {

			$ptn = PerformanceTaskNumber::where('quarter_id', $active_quarter->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		}
		// for grade 11 and 12
		else {
			$ptn = PerformanceTaskNumber::where('semester_id', $active_sem->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		}



		if (count($ptn) == 0) {
			$ptn = new PerformanceTaskNumber();
			if ($section->grade_level->id == 5 || $section->grade_level->id == 6) {
				$ptn->semester_id = $active_sem->id;
			} else {
				$ptn->quarter_id = $active_quarter->id;
			}
			$ptn->section_id = $section->id;
			$ptn->subject_id = $subject->id;
			$ptn->total = $total;
			$ptn->number = 1;
			$ptn->save();
		} else {
			// increase the number of the written work number
			$ptn->number = $ptn->number + 1;
			$ptn->total = $total;
			$ptn->save();
		}



		// set array for score together with student id of the student
		foreach ($section->students as $std) {

			// check if theres an error preventing having an higher score than the total
			if ($total < $request[$std->user_id]) {
				$ptn->number = $ptn->number -  1;
				$ptn->total = $ptn->total - $total;
				$ptn->save();

				return redirect()->back()->with('error', 'The Scores Must NOT Be Greater Than The Total.');
			}

			if ($section->grade_level->id == 5 || $section->grade_level->id == 6) {

				$score[] = [
					'semester_id' => $active_sem->id,
					'section_id' => $section->id,
					'subject_id' => $subject->id,
					'student_id' => $std->id,
					'performance_task_number' => $ptn->number,
					'performance_task_id' => $ptn->id,
					'score' => $request[$std->user_id],
					'total' => $total

				];
			} else {

				$score[] = [
					'quarter_id' => $active_quarter->id,
					'section_id' => $section->id,
					'subject_id' => $subject->id,
					'student_id' => $std->id,
					'performance_task_number' => $ptn->number,
					'performance_task_id' => $ptn->id,
					'score' => $request[$std->user_id],
					'total' => $total
				];
			}
		}

		// insert score in written work scores table
		DB::table('performance_task_scores')->insert($score);


		// user log 
		$log = new ActivityLogs();
		$log->user_id = Auth::user()->id;
		$log->action = 'Added Performance Task # ' . $ptn->number . ' on ' . $section->grade_level->name . ' - ' . $section->name;
		$log->save();

		return redirect()->back()->with('success', 'Performance Task #' . $ptn->number . ' Sucessfully Saved!');

		return 'error in post add performance task';
	}


	// method use to view performance task
	public function viewPerformanceTask($section_id = null, $subject_id = null)
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


		$quarter = Quarter::whereStatus(1)->first();
		$semester = Semester::whereStatus(1)->first();

		$section = Section::findorfail($section_id);
		$subject = Subject::findorfail($subject_id);

		// check how many written works has taken
		// check also if junior or senior high
		if ($section->grade_level->id == 1 || $section->grade_level->id == 2 || $section->grade_level->id == 3 || $section->grade_level->id == 4) {

			$ptn = PerformanceTaskNumber::where('quarter_id', $quarter->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		} else {
			$ptn = PerformanceTaskNumber::where('semester_id', $semester->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		}

		if (count($ptn) == 0) {
			return view('teacher.no-score-performance-task', ['students' => $students, 'subject' => $subject,  'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
		}

		// get all scores in the quarter/sem using the id of the written work
		$scores = PerformanceTaskScore::where('performance_task_id', $ptn->id)->get();



		return view('teacher.view-performance-task-scores', ['scores' => $scores, 'ptn' => $ptn, 'students' => $students, 'subject' => $subject,  'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}



	// method use to viwe update performance task
	public function updatePerformanceTaskScore($id = null, $user_id = null)
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
		$score = PerformanceTaskScore::findorfail($id);
		$student = User::where('id', $user_id)->first();

		return view('teacher.teacher-update-performance-task-score', ['students' => $students, 'score' => $score, 'student' => $student, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}



	// method post update performance task
	public function postUpdatePerformanceTaskScore(Request $request)
	{
		$this->validate($request, [
			'score' => 'required|numeric'
		]);

		$score = $request['score'];
		$total = $request['total'];


		$pts = PerformanceTaskScore::findorfail($request['id']);
		$pts->score = $score;
		$pts->save();

		// log
		$log = new ActivityLogs();
		$log->user_id = Auth::user()->id;
		$log->action = 'Update Performance Task Score';
		$log->save();


		return redirect()->route('view_performance_task_score', ['section_id' => $pts->section_id, 'subject_id' => $pts->subject_id])->with('success', 'Score Updated!');
	}

	public function addExam($section_id = null, $subject_id = null)
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


		// check if there is selected sem & quarter
		$quarter = Quarter::whereStatus(1)->first();
		$sem = Semester::whereStatus(1)->first();


		if (count($quarter) == 0 || count($sem) == 0) {
			return 'no selected semester or quarter';
		}

		$section = Section::findorfail($section_id);
		$subject = Subject::findorfail($subject_id);



		// select students
		$studs = StudentInfo::where('section_id', $section_id)
			->get();

		// return $students;

		return view('teacher.add-exam', [
			'students' => $students, 'section' => $section, 'studs' => $studs, 'subject' => $subject, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12
		]);
	}


	// method use to add exam score
	public function postAddExam(Request $request)
	{

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
		if ($section->grade_level->id == 1 || $section->grade_level->id == 2 || $section->grade_level->id == 3 || $section->grade_level->id == 4) {

			$exam = ExamScoreNumber::where('quarter_id', $active_quarter->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		}
		// for grade 11 and 12
		else {
			$exam = ExamScoreNumber::where('semester_id', $active_sem->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		}



		if (count($exam) == 0) {
			$exam = new ExamScoreNumber();
			if ($section->grade_level->id == 5 || $section->grade_level->id == 6) {
				$exam->semester_id = $active_sem->id;
			} else {
				$exam->quarter_id = $active_quarter->id;
			}
			$exam->section_id = $section->id;
			$exam->subject_id = $subject->id;
			$exam->total = $total;
			$exam->number = 1;
			$exam->save();
		} else {
			// increase the number of the written work number
			$exam->number = $exam->number + 1;
			$exam->total = $total;
			$exam->save();
		}
		// set array for score together with student id of the student
		foreach ($section->students as $std) {

			if ($total < $request[$std->user_id]) {
				$exam->number = $exam->number -  1;
				$exam->total = $exam->total - $total;
				$exam->save();

				return redirect()->back()->with('error', 'The Scores Must NOT Be Greater Than The Total.');
			}

			if ($section->grade_level->id == 5 || $section->grade_level->id == 6) {

				$score[] = [
					'semester_id' => $active_sem->id,
					'section_id' => $section->id,
					'subject_id' => $subject->id,
					'student_id' => $std->id,
					'exam_number' => $exam->number,
					'exam_id' => $exam->id,
					'score' => $request[$std->user_id],
					'total' => $total

				];
			} else {

				$score[] = [
					'quarter_id' => $active_quarter->id,
					'section_id' => $section->id,
					'subject_id' => $subject->id,
					'student_id' => $std->id,
					'exam_number' => $exam->number,
					'exam_id' => $exam->id,
					'score' => $request[$std->user_id],
					'total' => $total

				];
			}
		}

		// insert score in written work scores table
		DB::table('exam_scores')->insert($score);


		// user log 
		$log = new ActivityLogs();
		$log->user_id = Auth::user()->id;
		$log->action = 'Added Exam on ' . $section->grade_level->name . ' - ' . $section->name;
		$log->save();

		return redirect()->back()->with('success', 'Exam # ' . $exam->number . ' Sucessfully Saved!');

		return 'error in post add exam ';
	}



	// method use to view exam score
	public function viewExamScore($section_id = null, $subject_id = null)
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


		$quarter = Quarter::whereStatus(1)->first();
		$semester = Semester::whereStatus(1)->first();

		$section = Section::findorfail($section_id);
		$subject = Subject::findorfail($subject_id);

		// check how many written works has taken
		// check also if junior or senior high
		if ($section->grade_level->id == 1 || $section->grade_level->id == 2 || $section->grade_level->id == 3 || $section->grade_level->id == 4) {

			$exam = ExamScoreNumber::where('quarter_id', $quarter->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		} else {
			$exam = ExamScoreNumber::where('semester_id', $semester->id)
				->where('section_id', $section->id)
				->where('subject_id', $subject->id)
				->first();
		}

		if (count($exam) == 0) {
			return view('teacher.no-score-exam', ['students' => $students, 'subject' => $subject, 'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
		}

		// get all scores in the quarter/sem using the id of the written work
		$scores = ExamScore::where('exam_id', $exam->id)->get();



		return view('teacher.view-exam-scores', ['scores' => $scores, 'exam' => $exam, 'students' => $students, 'subject' => $subject,  'section' => $section, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}

	public function updateExamScore($id = null, $user_id = null)
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


		$score = ExamScore::findorfail($id);
		$student = User::where('id', $user_id)->first();

		return view('teacher.teacher-update-exam-score', ['students' => $students, 'score' => $score, 'student' => $student, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
	}



	// update exam score
	public function postUpdateExamScore(Request $request)
	{
		$this->validate($request, [
			'score' => 'required|numeric'
		]);

		$score = $request['score'];
		$total = $request['total'];

		$exam = ExamScore::findorfail($request['id']);
		$exam->score = $score;
		$exam->save();

		// log
		$log = new ActivityLogs();
		$log->user_id = Auth::user()->id;
		$log->action = 'Update Exam Score';
		$log->save();


		return redirect()->route('view_exam_score', ['sectionid' => $exam->section_id, 'subjectid' => $exam->subject_id,])->with('success', 'Score Updated!');
	}


	public function viewPercentageScores($section_id = null, $subject_id = null)
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


		$first_quarter = Quarter::findorfail(1);
		$second_quarter = Quarter::findorfail(2);
		$third_quarter = Quarter::findorfail(3);
		$fourth_quarter = Quarter::findorfail(4);

		$first_sem = Semester::findorfail(1);
		$second_sem = Semester::findorfail(2);


		$section = Section::find($section_id);
		$sub = Subject::find($subject_id);
		

		if ($section->level <= 4) {

			// for first quarter
			if ($first_quarter->status == 1) {

				// compute grade here
				// get all raw scores and compute
				// get all written work in first quarter
				foreach ($section->students as $std) {
					// total subject total in first quarter\
					$ww_scores_q1[] = [
						'student_id' => $std->id,
						
						'score' => WrittenWorkScore::where('quarter_id', 1)
							->where('section_id', $section_id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->id)
							->sum('score'),
						'total' => WrittenWorkScore::where('quarter_id', 1)
							->where('section_id', $section_id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->id)
							->sum('total')
					];
					// if ($std->id == 3){
					// 	return $ww_scores_q1;
					// }
				

					$pt_scores_q1[] = [
						'student_id' => $std->user_id,
						'score' => PerformanceTaskScore::where('quarter_id', 1)
							->where('section_id', $section_id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->id)
							->sum('score'),
						'total' => PerformanceTaskScore::where('quarter_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->id)
							->sum('total')
					];

					$exam_scores_q1[] = [
						'student_id' => $std->user_id,
						'score' => ExamScore::where('quarter_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->id)
							->sum('score'),
						'total' => ExamScore::where('quarter_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->id)
							->sum('total')
					];
				}



				foreach ($section->students as $std) {
					$ww_percentage = 0;
					$pt_percentage = 0;
					$exam_percentage = 0;
					$grade = 0;

					foreach ($ww_scores_q1 as $ws) {
						if ($std->id == $ws['student_id'] && $ws['score'] != 0) {
							$ww_percentage = ($ws['score'] / $ws['total']) * 100 ;
						}
					}


					foreach ($pt_scores_q1 as $pt) {
						if ($std->user_id == $pt['student_id'] && $pt['score'] != 0) {
							$pt_percentage = ($pt['score'] / $pt['total']) *  100;
						}
					}


					foreach ($exam_scores_q1 as $es) {
						if ($std->user_id == $es['student_id'] && $es['score'] != 0) {
							$exam_percentage = ($es['score'] / $es['total']) * 100;
						}
					}



					$grade = ($ww_percentage*($sub->written_work/100)) + ($pt_percentage*($sub->performance_task/100)) + ($exam_percentage*($sub->exam/100));
			


					$pg[] = [
						'student_id' => $std->id,
						'ww_percentage' => $ww_percentage,
						'pt_percentage' => $pt_percentage,
						'exam_percentage' => $exam_percentage,
						'grade' => number_format($grade)
					];
				}

				return view('teacher.student-percentage-scores', ['students' => $students, 'section' => $section, 'pg' => $pg, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
			} // end of first quarter


			// for second quarter
			if ($second_quarter->status == 1) {
				// compute grade here
				// get all raw scores and compute
				// get all written work in first quarter
				foreach ($section->students as $std) {
					// total subject total in first quarter\
					$ww_scores_q2[] = [
						'student_id' => $std->user_id,
						'score' => WrittenWorkScore::where('quarter_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => WrittenWorkScore::where('quarter_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];


					$pt_scores_q2[] = [
						'student_id' => $std->user_id,
						'score' => PerformanceTaskScore::where('quarter_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => PerformanceTaskScore::where('quarter_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];

					$exam_scores_q2[] = [
						'student_id' => $std->user_id,
						'score' => ExamScore::wherewhere('quarter_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => ExamScore::where('quarter_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];
				}



				foreach ($section->students as $std) {
					$ww_percentage = 0;
					$pt_percentage = 0;
					$exam_percentage = 0;
					$grade = 0;

					foreach ($ww_scores_q2 as $ws) {
						if ($std->user_id == $ws['student_id'] && $ws['score'] != 0) {
							$ww_percentage = ($ws['score'] / $ws['total']) * ($sub->written_work / 100);
						}
					}


					foreach ($pt_scores_q2 as $pt) {
						if ($std->user_id == $pt['student_id'] && $pt['score'] != 0) {
							$pt_percentage = ($pt['score'] / $pt['total']) * ($sub->performance_task / 100);
						}
					}


					foreach ($exam_scores_q2 as $es) {
						if ($std->user_id == $es['student_id'] && $es['score'] != 0) {
							$exam_percentage = ($es['score'] / $es['total']) * ($sub->exam / 100);
						}
					}



					$grade = ($ww_percentage * 100) + ($pt_percentage * 100) + ($exam_percentage * 100);


					$pg[] = [
						'student_id' => $std->user_id,
						'ww_percentage' => $ww_percentage * 100,
						'pt_percentage' => $pt_percentage * 100,
						'exam_percentage' => $exam_percentage * 100,
						'grade' => number_format($grade)
					];
				}

				return view('teacher.student-percentage-scores', ['students' => $students, 'section' => $section, 'pg' => $pg, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
			} // end of second quarter




			// for third quarter
			if ($third_quarter->status == 1) {
				// compute grade here
				// get all raw scores and compute
				// get all written work in first quarter
				foreach ($section->students as $std) {
					// total subject total in first quarter\
					$ww_scores_q3[] = [
						'student_id' => $std->user_id,
						'score' => WrittenWorkScore::where('quarter_id', 3)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => WrittenWorkScore::where('quarter_id', 3)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];


					$pt_scores_q3[] = [
						'student_id' => $std->user_id,
						'score' => PerformanceTaskScore::where('quarter_id', 3)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => PerformanceTaskScore::where('quarter_id', 3)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];

					$exam_scores_q3[] = [
						'student_id' => $std->user_id,
						'score' => ExamScore::wherewhere('quarter_id', 3)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => ExamScore::where('quarter_id', 3)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_number', $std->user_id)
							->sum('total')
					];
				}



				foreach ($section->students as $std) {
					$ww_percentage = 0;
					$pt_percentage = 0;
					$exam_percentage = 0;
					$grade = 0;

					foreach ($ww_scores_q3 as $ws) {
						if ($std->user_id == $ws['student_id'] && $ws['score'] != 0) {
							$ww_percentage = ($ws['score'] / $ws['total']) * ($sub->written_work / 100);
						}
					}


					foreach ($pt_scores_q3 as $pt) {
						if ($std->user_id == $pt['student_id'] && $pt['score'] != 0) {
							$pt_percentage = ($pt['score'] / $pt['total']) * ($sub->performance_task / 100);
						}
					}


					foreach ($exam_scores_q3 as $es) {
						if ($std->user_id == $es['student_id'] && $es['score'] != 0) {
							$exam_percentage = ($es['score'] / $es['total']) * ($sub->exam / 100);
						}
					}



					$grade = ($ww_percentage * 100) + ($pt_percentage * 100) + ($exam_percentage * 100);


					$pg[] = [
						'student_id' => $std->user_id,
						'ww_percentage' => $ww_percentage * 100,
						'pt_percentage' => $pt_percentage * 100,
						'exam_percentage' => $exam_percentage * 100,
						'grade' => number_format($grade)
					];
				}

				return view('teacher.student-percentage-scores', ['students' => $students, 'section' => $section, 'pg' => $pg, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
			} // end of third quarter



			// for fourth quarter
			if ($fourth_quarter->status == 1) {
				// compute grade here
				// get all raw scores and compute
				// get all written work in first quarter
				foreach ($section->students as $std) {
					// total subject total in first quarter\
					$ww_scores_q4[] = [
						'student_id' => $std->user_id,
						'score' => WrittenWorkScore::where('quarter_id', 4)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_number', $std->user_id)
							->sum('score'),
						'total' => WrittenWorkScore::where('quarter_id', 4)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_number', $std->user_id)
							->sum('total')
					];


					$pt_scores_q4[] = [
						'student_id' => $std->user_id,
						'score' => PerformanceTaskScore::where('quarter_id', 4)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_number', $std->user_id)
							->sum('score'),
						'total' => PerformanceTaskScore::where('quarter_id', 4)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_number', $std->user_id)
							->sum('total')
					];

					$exam_scores_q4[] = [
						'student_id' => $std->user_id,
						'score' => ExamScore::where('quarter_id', 4)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_number', $std->user_id)
							->sum('score'),
						'total' => ExamScore::where('quarter_id', 4)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_number', $std->user_id)
							->sum('total')
					];
				}



				foreach ($section->students as $std) {
					$ww_percentage = 0;
					$pt_percentage = 0;
					$exam_percentage = 0;
					$grade = 0;

					foreach ($ww_scores_q4 as $ws) {
						if ($std->user_id == $ws['student_id'] && $ws['score'] != 0) {
							$ww_percentage = ($ws['score'] / $ws['total']) * ($sub->written_work / 100);
						}
					}


					foreach ($pt_scores_q4 as $pt) {
						if ($std->user_id == $pt['student_id'] && $pt['score'] != 0) {
							$pt_percentage = ($pt['score'] / $pt['total']) * ($sub->performance_task / 100);
						}
					}


					foreach ($exam_scores_q4 as $es) {
						if ($std->user_id == $es['student_id'] && $es['score'] != 0) {
							$exam_percentage = ($es['score'] / $es['total']) * ($sub->exam / 100);
						}
					}



					$grade = ($ww_percentage * 100) + ($pt_percentage * 100) + ($exam_percentage * 100);


					$pg[] = [
						'student_id' => $std->user_id,
						'ww_percentage' => $ww_percentage * 100,
						'pt_percentage' => $pt_percentage * 100,
						'exam_percentage' => $exam_percentage * 100,
						'grade' => number_format($grade)
					];
				}

				return view('teacher.student-percentage-scores', ['students' => $students, 'section' => $section, 'pg' => $pg, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
			} // end of fourth quarter


		} else {

			if ($first_sem->status == 1) {
				// compute grade here
				// get all raw scores and compute
				// get all written work in first quarter
				foreach ($section->students as $std) {
					// total subject total in first quarter\
					$ww_scores_s1[] = [
						'student_id' => $std->user_id,
						'score' => WrittenWorkScore::where('semester_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => WrittenWorkScore::where('semester_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];


					$pt_scores_s1[] = [
						'student_id' => $std->user_id,
						'score' => PerformanceTaskScore::where('semester_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => PerformanceTaskScore::where('semester_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];

					$exam_scores_s1[] = [
						'student_id' => $std->user_id,
						'score' => ExamScore::where('semester_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => ExamScore::where('semester_id', 1)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];
				}


				foreach ($section->students as $std) {
					$ww_percentage = 0;
					$pt_percentage = 0;
					$exam_percentage = 0;
					$grade = 0;

					foreach ($ww_scores_s1 as $ws) {
						if ($std->user_id == $ws['student_id'] && $ws['score'] != 0) {
							$ww_percentage = ($ws['score'] / $ws['total']) * ($sub->written_work / 100);
						}
					}



					foreach ($pt_scores_s1 as $pt) {
						if ($std->user_id == $pt['student_id'] && $pt['score'] != 0) {
							$pt_percentage = ($pt['score'] / $pt['total']) * ($sub->performance_task / 100);
						}
					}

					foreach ($exam_scores_s1 as $es) {
						if ($std->user_id == $es['student_id'] && $es['score'] != 0) {
							$exam_percentage = ($es['score'] / $es['total']) * ($sub->exam / 100);
						}
					}

					$grade = ($ww_percentage * 100) + ($pt_percentage * 100) + ($exam_percentage * 100);


					$pg[] = [
						'student_id' => $std->user_id,
						'ww_percentage' => $ww_percentage * 100,
						'pt_percentage' => $pt_percentage * 100,
						'exam_percentage' => $exam_percentage * 100,
						'grade' => number_format($grade)
					];
				}
				return view('teacher.student-percentage-scores', ['students' => $students, 'section' => $section, 'pg' => $pg, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
			} // end of first sem


			if ($second_sem->status == 1) {
				// compute grade here
				// get all raw scores and compute
				// get all written work in first quarter
				foreach ($section->students as $std) {
					// total subject total in first quarter\
					$ww_scores_s2[] = [
						'student_id' => $std->user_id,
						'score' => WrittenWorkScore::where('semester_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => WrittenWorkScore::where('semester_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];


					$pt_scores_s2[] = [
						'student_id' => $std->user_id,
						'score' => PerformanceTaskScore::where('semester_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => PerformanceTaskScore::where('semester_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];

					$exam_scores_s2[] = [
						'student_id' => $std->user_id,
						'score' => ExamScore::where('semester_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('score'),
						'total' => ExamScore::wherewhere('semester_id', 2)
							->where('section_id', $section->id)
							->where('subject_id', $subject_id)
							->where('student_id', $std->user_id)
							->sum('total')
					];
				}


				foreach ($section->students as $std) {
					$ww_percentage = 0;
					$pt_percentage = 0;
					$exam_percentage = 0;
					$grade = 0;

					foreach ($ww_scores_s2 as $ws) {
						if ($std->user_id == $ws['student_id'] && $ws['score'] != 0) {
							$ww_percentage = ($ws['score'] / $ws['total']) * ($sub->written_work / 100);
						}
					}



					foreach ($pt_scores_s2 as $pt) {
						if ($std->user_id == $pt['student_id'] && $pt['score'] != 0) {
							$pt_percentage = ($pt['score'] / $pt['total']) * ($sub->performance_task / 100);
						}
					}

					foreach ($exam_scores_s2 as $es) {
						if ($std->user_id == $es['student_id'] && $es['score'] != 0) {
							$exam_percentage = ($es['score'] / $es['total']) * ($sub->exam / 100);
						}
					}

					$grade = ($ww_percentage * 100) + ($pt_percentage * 100) + ($exam_percentage * 100);

					$pg[] = [
						'student_id' => $std->user_id,
						'ww_percentage' => $ww_percentage * 100,
						'pt_percentage' => $pt_percentage * 100,
						'exam_percentage' => $exam_percentage * 100,
						'grade' => number_format($grade)
					];
				}

				return view('teacher.student-percentage-scores', ['students' => $students, 'section' => $section, 'pg' => $pg, 'grade7' => $grade7, 'grade8' => $grade8, 'grade9' => $grade9, 'grade10' => $grade10, 'grade11' => $grade11, 'grade12' => $grade12]);
			} // end of second sem

		}
	}
}
