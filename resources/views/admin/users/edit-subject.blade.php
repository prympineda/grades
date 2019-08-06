@extends('layouts.admin')


@section('content')

<h1>Edit Section</h1>



<div class="row">
    <div class="col-md-6">
        @include('includes.success')
        <form action="{{ route('post_edit_subject') }}" method="POST" autocomplete="off">
            <div class="form-group">
                <!-- <select name="grade_level" class="form-control">
        <option value="">Subject For...</option>
        @foreach($levels as $l)
        <option @if($subject->level == $l->id) selected @endif value="{{ $l->id }}">{{ $l->name }}</option>
        @endforeach
        </select> -->
                <input type="text" name="" class="form-control" value="{{ ucwords($subject->grade_level->name) }}"
                    placeholder="" readonly="" />
                <input type="hidden" name="grade_level" value="{{ $subject->grade_level->id }}">
            </div>
            <div class="form-group">
                <input type="text" name="title" class="form-control text-capitalize" value="{{ $subject->title }}"
                    placeholder="Subject Title" required />
            </div>
            <div class="form-group">
                <textarea name="description" id="description" cols="30" rows="10" class="form-control text-capitalize"
                    placeholder="Description of the Subject..." required>{{ $subject->description }}</textarea>
            </div>
            <div class="form-group">
                Written Work: <input type="number" name="written_work" class="form-control"
                    value="{{ $subject->written_work }}" placeholder="%" required />
                Performance Task: <input type="number" name="performance_task" class="form-control"
                    value="{{ $subject->performance_task }}" placeholder="%" required />
                Exam: <input type="number" name="exam" class="form-control" value="{{ $subject->exam }}" placeholder="%"
                    required />
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $subject->id }}" />
                <button class="btn btn-primary">Update Subject</button>
                <a href="{{ route('get_all_subjects') }}" class="btn btn-danger">Cancel</a>
            </div>

    </div>

    </form>

    @include('includes.error_form')

</div>

</div>

@stop