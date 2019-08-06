@extends('layouts.admin')

@section('content')
    
<h1>Assign Subject</h1>

<div class="row">
        <div class="col-md-6">

          @include('includes.success')

          <form action="{{ route('post_assign_subject_level') }}" method="POST" autocomplete="off">
            <div class="form-group">
              <select name="teacher" id="" class="form-control">
                <option value="">Select Teacher</option>
                @foreach($teachers as $t)
                <option value="{{ $t->id }}">{{ ucwords($t->firstname) }} {{ ucwords($t->lastname) }}</option>
                @endforeach
                @if(count($teachers) == 0) 
                <option value="">No Teachers</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <select name="subject" id="" class="form-control">
                <option value="">Select Subject</option>
                @foreach($subjects as $s)
                <option value="{{ $s->id }}"> {{ ucwords($s->title) }}</option>
                @endforeach
                @if(count($subjects) == 0)
                <option value="">No Subjects</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <select name="section" id="" class="form-control">
                <option value="">Select Section</option>
                @foreach($sections as $sec)
                <option value="{{ $sec->id }}">{{ ucwords($sec->name) }}</option>
                @endforeach
                @if(count($sections) == 0)
                <option value="">No Sections on {{ ucwords($level->name) }}</option>
                @endif
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" name="level" value="{{ $level->id }}" />
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <button class="btn btn-primary">Assign Subject</button>
              <a href="{{ route('admin_dashboard') }}" class="btn btn-danger">Cancel</a>
            </div>

          </form>
        </div>
      </div>




@stop