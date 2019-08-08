@extends('layouts.teacher')


@section('content')

<h1>
    Add Exam : {{ ucwords($section->grade_level->name) }}-{{ ucwords($section->name) }} -
    {{ ucwords($subject->title) }}</h1>
</h1>
@include('includes.success')


<form action="{{ route('post_add_exam_score') }}" method="POST" autocomplete="off">
    <div class="form-group">
        <input type="number" name="total" max=100 min=1 onkeypress='return event.charCode >= 48 && event.charCode <= 57'
            placeholder="Total" id="total" />
    </div>
    <div class="form-group">
        <table class="table" id="studentsTable">
            <thead>
                <tr>
                    <th onclick="sortTable(0)" style="cursor: pointer;">Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studs as $std)
                <tr>
                    <td>{{ ucwords($std->user->lastname) }}, {{ ucwords($std->user->firstname) }}</td>
                    <td><input type="number" name="{{ $std->user->id }}" value="0" class="score" placeholder="Score" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="form-group">
        {{--  <input type="hidden" name="assign_id" value="{{ $assign->id }}" /> --}}
        <input type="hidden" name="section_id" value="{{ $section->id }}" />
        <input type="hidden" name="subject_id" value="{{ $subject->id }}" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('get_view_students_per_section', ['section_id'=> $section->id, 'subject_id' => $subject->id]) }}"
            class="btn btn-danger">Cancel</a>
    </div>
</form>


@stop