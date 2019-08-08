@extends('layouts.teacher')

@section('content')
<h1>{{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }} -
    {{ ucwords($subject->title) }}</h1>
<h2>No Written Works</h1>  


@stop