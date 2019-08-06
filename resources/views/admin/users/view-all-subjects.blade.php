@extends('layouts.admin')

@section('content')

<div class="d-flex bd-highlight mb-1">
    <div class="mr-auto p-2 bd-highlight">
        <h1>All Subject</h1>
    </div>
    <div class="pt-3 bd-highlight"><a href="{{ route('get_add_subject') }}" class="btn btn-primary float-right"
            role="button">Add Subject</a>
    </div>
</div>

<h3>{{ $subjects->total() }} total subjects</h3>
<b>In this page {{ $subjects->count() }} subjects</b>
@include('includes.success')

<table class="table table-hover">
    <thead>
        <tr>
            <th>Grade Level</th>
            <th>Subject Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
        <tr>
            <td class="text-capitalize">{{ $subject->grade_level->name }}</td>
            <td class="text-capitalize">{{ ucwords($subject->title) }}</td>
            <td>
                <a href="{{ route('get_edit_subject', $subject->id) }}"><i class="fa fa-edit"></i></a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#{{ $subject->id }}-remove"><i
                        class="fa fa-trash" aria-hidden="true"></i></button>
            </td>
        </tr>
        @include('admin.modal.delete-modal-subject')

        @endforeach
    </tbody>
</table>
<div class="text-center"> {{ $subjects->links() }}</div>
@stop