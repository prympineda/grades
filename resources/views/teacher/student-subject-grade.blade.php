@extends('layouts.teacher')


@section('content')
    
<h1>Student Grade: Students for {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }}  -  {{ ucwords($subject->title) }}</h1> 
@include('includes.success')

<table class="table table-hover" id="studentsTable">
    <thead>
      <tr>
        <th onclick="sortTable(0)" >Name</th>
        <th>First</th>
        <th>Second</th>
        <th>Third</th>
        <th>Fourth</th>
      </tr>
    </thead>
    <tbody>
      @foreach($section->students as $std)
        <tr>
          <td>{{ ucwords($std->user->lastname . ', ' . $std->user->firstname) }}</td>
          <td>
            @foreach($fqg as $f)
              @if($f['student_id'] == $std->id)
                @if($f['grade'] != 0)
                {{ floor(\App\Http\Controllers\StudentUsersController::getGrade($f['grade'])) }}
                @endif
              @endif
            @endforeach
          </td>
          <td>
            @foreach($sqg as $s)
              @if($s['student_id'] == $std->id)
                @if($s['grade'] != 0)
                {{ \App\Http\Controllers\StudentUsersController::getGrade($s['grade']) }}
                @endif
              @endif
            @endforeach
          </td>
          <td>
            @foreach($tqg as $t)
              @if($t['student_id'] == $std->id)
                @if($t['grade'] != 0)
                {{ \App\Http\Controllers\StudentUsersController::getGrade($t['grade']) }}
                @endif
              @endif
            @endforeach
          </td>
          <td>
            @foreach($foqg as $f)
              @if($f['student_id'] == $std->id)
                @if($f['grade'] != 0)
                {{ \App\Http\Controllers\StudentUsersController::getGrade($f['grade']) }}
                @endif
              @endif
            @endforeach
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@stop