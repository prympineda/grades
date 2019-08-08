@extends('layouts.teacher')


@section('content')

    
<h1>View Written Work Scores:  {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }} -
    {{ ucwords($subject->title) }}</h1>

    @include('includes.success')


    @for($x = 1; $x <= $ww_number->number; $x++)
    <p><a href="#" data-toggle="modal" data-target="#score-{{ $x }}">Written Work Number {{ $x }}</a></p>
    @include('teacher.modal.modal-view-written-work-scores')
    @endfor

@stop