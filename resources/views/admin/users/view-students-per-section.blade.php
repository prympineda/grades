@extends('layouts.admin')

@section('content')

 <h1> Students for {{ ucwords($section->grade_level->name) }}-{{ $section->name }}</h1> 

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($students as $student)
        <tr>
            <td>{{ ucwords($student->user->lastname) }}</td>
            <td>{{ ucwords($student->user->firstname) }}</td>
        </tr>


        @endforeach


    </tbody>

</table>


@stop