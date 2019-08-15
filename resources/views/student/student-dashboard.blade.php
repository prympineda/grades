@extends('layouts.student')

@section('content')

<h1>Student Dashboard</h1>
<h2>{{ $section->section->grade_level->name }} - {{ ucwords($section->section->name) }}</h2>
    

@stop