@extends('layouts.teacher')

@section('content')
    

<h1>Assigned Subjects/Sections {{ $level->name }}</h1>

<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Grade Level</th>
                <th scope="col">Section Name</th>
                <th scope="col">Subject</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
    
            @foreach ($assigned as $assign)
            <tr>
                <td>{{ $level->name }}</td>
                <td>{{ ucwords($assign->name) }}</td>  
                <td>{{ $assign->title }}</td>
                <td><a href="{{ route('get_view_students_per_section', ['section_id'=> $assign->section_id, 'subject_id' => $assign->subject_id]) }}" class="btn btn-primary">View Students</a></td>
            </tr>
    
    
            @endforeach
    
    
        </tbody>
    
    </table>


@stop