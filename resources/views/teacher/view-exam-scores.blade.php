@extends('layouts.teacher')

@section('content')

<h1>View Exam Scores: {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }} -
    {{ ucwords($subject->title) }}</h1>

@include('includes.success')


@for($x = 1; $x <= $exam->number; $x++)
    <p><a href="#" data-toggle="modal" data-target="#score-{{ $x }}">Exam Number {{ $x }}</a></p>
    @include('teacher.modal.modal-view-exam-scores')
    @endfor


@stop