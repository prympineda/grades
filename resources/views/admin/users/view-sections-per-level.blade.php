@extends('layouts.admin')


@section('content')

<h1>Sections for {{ $grade_level->name }}  </h1>

<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Grade Level</th>
                <th scope="col">Section Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
    
            @foreach ($sections as $section)
            <tr>
              
                <td>{{ $section->grade_level->name }}</td>
                <td>{{ $section->name }}</td>
                <td>
                    <a href="{{ route('get_students_per_section', $section->id) }}" class="btn btn-primary">View Students</a>
                </td>
            </tr>
    
    
            @endforeach
    
    
        </tbody>
    
    </table>


@stop