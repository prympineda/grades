@extends('layouts.admin')


@section('content')

<h1>Edit Section</h1>

<form action="{{ route('post_edit_section') }}" method="POST" autocomplete="off">
    <div class="form-group">
        <!-- <input type="text" name="title" class="form-control text-capitalize" placeholder="Grade Level Title" /> -->
        <!-- <select name="grade_level" class="form-control">
        <option value="">Select Grade Level</option>
        @foreach($levels as $l)
        <option @if($l->id == $section->level) {{ $level = $l }} selected @endif value="{{ $l->id }}">{{ ucwords($l->name) }}</option>
        
        @endforeach
      </select> -->
        <input type="text" value="{{ ucwords($level->name) }}" class="form-control" readonly="" />
        <input type="hidden" name="grade_level" value="{{ $level->id }}">
    </div>
    <div class="form-group">
        <input type="text" name="name" class="form-control text-capitalize" value="{{ $section->name }}"
            placeholder="Section Name" />
    </div>
    <div class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $section->id }}" />
        <button class="btn btn-primary">Update Section</button>
        <a href="{{ route('get_all_sections') }}" class="btn btn-danger">Cancel</a>
    </div>
</form>
@include('includes.error_form')



@stop