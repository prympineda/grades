@extends('layouts.teacher')

@section('content')
    
<h1> Students for {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }}  -  {{ ucwords($subject->title) }}</h1> 
@include('includes.success')
<div>
        
        <a href="{{ route('add_written_work_score', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}" class="btn btn-primary btn-xs">Add Written Work</a>
        <a href="{{ route('add_performance_task_score', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}" class="btn btn-primary btn-xs">Add Performance Task</a>
        <a href="{{ route('add_exam_score', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}" class="btn btn-primary btn-xs">Add Exam</a>
        |
        <a href="{{ route('view_written_work_score', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}" class="btn btn-success btn-xs">View Written Works Scores</a>
        <a href="{{ route('view_performance_task_score', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}" class="btn btn-success btn-xs">View Performance Task Scores</a>
        <a href="{{ route('view_exam_score', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}" class="btn btn-success btn-xs">View Exam Scores</a>
        
        <a href="" class="btn btn-success btn-xs">Percentage Scores</a>

        <a href="" class="btn btn-success btn-xs">View Grades</a>
      </div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($studs as $student)
        <tr>
            <td>{{ ucwords($student->user->lastname) }}</td>
            <td>{{ ucwords($student->user->firstname) }}</td>
        </tr>


        @endforeach


    </tbody>

</table>




@stop