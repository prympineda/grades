@extends('layouts.admin')


@section('content')

<h1>Add Subject</h1>


<div class="row">
    <div class="col-md-6">
<form action="{{ route('post_add_subject') }}" method="POST" autocomplete="off">

    @include('includes.success')

    <div class="form-group">
      <select name="grade_level" class="form-control">
      <option value="{{ old('grade_level') }}">Subject For...</option>
      @foreach($levels as $l)
      <option value="{{ $l->id }}">{{ $l->name }}</option>
      @endforeach
      </select>
    </div>
    <div class="form-group">
      <input type="text" name="title" class="form-control text-capitalize" value="{{ old('title') }}" placeholder="Subject Title" required>
    </div>
    <div class="form-group">
      <textarea name="description" id="description" cols="30" rows="10" class="form-control text-capitalize" placeholder="Description of the Subject..." aria-valuetext="{{ old('description') }}" required></textarea>
    </div>
    <div class="form-group">
      Written Work: <input type="text" name="written_work" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="%" value="{{ old('written_work') }}" required/>
      Performance Task: <input type="text" name="performance_task" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="%" value="{{ old('performance_task') }}" required/>
      Exam: <input type="text" name="exam" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="%" value="{{ old('exam') }}" required/>
    </div>
    <div class="form-group">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <button class="btn btn-primary">Add Subject</button>
      <a href="{{ route('get_all_subjects') }}" class="btn btn-danger">Cancel</a>
    </div>

  </form>

  @include('includes.error_form')

</div>

</div>
@stop