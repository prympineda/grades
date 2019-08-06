@extends('layouts.admin')

@section('content')

<h1>Edit Assigned Subject</h1>


<div class="row">
    <div class="col-md-6">
        {{-- Includes errors and session flash message display container --}}
        @include('includes.success')

        <form action="{{ route('post_edit_assigned_subject') }}" method="POST" autocomplete="off">
            <div class="form-group">
                <select name="teacher" id="" class="form-control">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $t)
                    <option value="{{ $t->id }}">{{ ucwords($t->firstname) }} {{ ucwords($t->lastname) }} </option>
                    @endforeach
                    @if(count($teachers) == 0)
                    <option value="">No Teachers</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="grade_level_subject"
                    value="{{ ucwords($subjectassign->section->grade_level->name . ' - ' . $subjectassign->subject->title) }}"
                    class="form-control" readonly="" />
            </div>
            <div class="form-group">
                <input type="text" name="grade_level_subject" value="{{ ucwords($subjectassign->section->name) }}"
                    class="form-control" readonly="" />
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $subjectassign->id }}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-primary">Update Subject Assignment</button>
                <a href="{{ route('get_all_assigned_subjects') }}" class="btn btn-danger">Cancel</a>
            </div>

        </form>
        @include('includes.error_form')


    </div>
</div>









@stop