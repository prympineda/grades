@extends('layouts.admin')

@section('content')

<h1>Add Section</h1>
<div class="row">
        <div class="col-lg-5 col-md-12">
<form action="{{ route('post_add_section') }}" method="POST" autocomplete="off">
    <div class="form-group">
        <!-- <input type="text" name="title" class="form-control text-capitalize" placeholder="Grade Level Title" /> -->
        <select name="grade_level" class="form-control" required>
            <option value="">Select Grade Level</option>
            @foreach($levels as $l)
            <option value="{{ $l->id }}">{{ ucwords($l->name) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="name" class="form-control text-capitalize" placeholder="Section Name" required/>
    </div>
    <div class="form-group">
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
      {{ csrf_field() }}
        <button class="btn btn-primary">Add Section</button>
        <a href="{{ route('get_all_sections') }}" class="btn btn-danger">Cancel</a>
    </div>
</form>
</div>
</div>
@stop