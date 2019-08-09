@extends('layouts.teacher')


@section('content')

<h1>Percentage Score</h1>


<table class="table table-hover">
    <thead>
        <tr>
            <th style="cursor: pointer;">Name</th>
            <th>Written Work Score Percentage</th>
            <th>Performance Task Score Percentage</th>
            <th>Exam Score Percentage</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($section->students as $std)
        @foreach($pg as $p)
        @if($std->id == $p['student_id'])
        <tr>
            <td>{{ ucwords($std->user->lastname . ', ' . $std->user->firstname) }}</td>
            <td>{{ $p['ww_percentage'] }}</td>
            <td>{{ $p['pt_percentage'] }}</td>
            <td>{{ $p['exam_percentage'] }}</td>
            <td>{{ $p['grade'] }}</td>
           
        </tr>
        @endif
        @endforeach
        @endforeach
    </tbody>
</table>

@stop