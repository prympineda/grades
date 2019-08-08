@extends('layouts.teacher')

@section('content')
    
<h1>View Performance Task Scores:  {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }} -
        {{ ucwords($subject->title) }}</h1>
    
        @include('includes.success')
    
    
        @for($x = 1; $x <= $ptn->number; $x++)
        <p><a href="#" data-toggle="modal" data-target="#score-{{ $x }}">Performance Task {{ $x }}</a></p>
        @include('teacher.modal.modal-view-performance-task-scores')
        @endfor

@stop