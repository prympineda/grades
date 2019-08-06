@extends('layouts.admin')


@section('content')

<h1>View All Subject Assigned</h1>
@include('includes.success')    
<table class="table table-hover">
    <thead>
        <tr>
            <th>Grade Level &amp; Section</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assigned as $as)
        <tr>
            <td>{{ $as->subject->grade_level->name }} - {{ ucwords($as->section->name) }}</td>
            <td>{{ ucwords($as->subject->title) }}</td>
            <td>{{ ucwords($as->teacher->firstname) }} {{ ucwords($as->teacher->lastname) }}</td>
            <td><a href="{{ route('get_edit_assigned_subject', ['id' => $as->id]) }}"
                    class="btn btn-primary btn-xs">Change</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>









@stop