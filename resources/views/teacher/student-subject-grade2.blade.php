@extends('layouts.teacher')

@section('content')

<h1>Student Grade: Students for {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }} -
    {{ ucwords($subject->title) }}</h1>

<table class="table table-hover" id="studentsTable">
    <thead>
        <tr>
            <th onclick="sortTable(0);">Name</th>
            <th>First</th>
            <th>Second</th>
        </tr>
    </thead>
    <tbody>
        @foreach($section->students as $std)
        <tr>
            <td>{{ ucwords($std->user->lastname . ', ' . $std->user->firstname) }}</td>
            <td>
                @foreach($fsg as $f)
                @if($f['student_id'] == $std->id)
                @if($f['grade'] != 0)
                {{ \App\Http\Controllers\StudentUsersController::getGrade($f['grade']) }}
                @endif
                @endif
                @endforeach
            </td>
            <td>
                @foreach($ssg as $s)
                @if($s['student_id'] == $std->id)
                @if($s['grade'] != 0)
                {{ \App\Http\Controllers\StudentUsersController::getGrade($s['grade']) }}
                @endif
                @endif
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop