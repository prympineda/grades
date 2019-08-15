@extends('layouts.student')

@section('content')

<h1>Grades</h1>
<h2>{{ $section->grade_level->name }} - {{ ucwords($section->name) }}</h2>

<table class="table table-hover">
    <thead>
        <tr>
            {{--  <th style="cursor: pointer;">Name</th>  --}}
            <th>Subjects</th>
            <th>First Semester</th>
            <th>Second Semester</th>
            <th>Average</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $sub)
        <tr>
            <td>{{ $sub->title }}</td>
            <td> @if(count($fsg) != 0)
                @foreach($fsg as $f)
                @if($f['subject_id'] == $sub->id)
                @if($f['grade'] == 0)
                N/A
                @else
                <strong>{{ $f = \App\Http\Controllers\StudentUsersController::getGrade($f['grade']) }}</strong>
                @endif
                @endif
                @endforeach
                @endif
            </td>
            <td> @if(count($ssg) != 0)
                @foreach($sqg as $s)
                @if($s['subject_id'] == $sub->id)
                @if($s['grade'] == 0)
                N/A
                @else
                <strong>{{ $s = \App\Http\Controllers\StudentUsersController::getGrade($s['grade']) }}</strong>
                @endif
                @endif
                @endforeach
                @endif
            </td>
            <td>...</td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop