@extends('layouts.admin')

@section('content')
    


<div class="d-flex bd-highlight mb-1">
    <div class="mr-auto p-2 bd-highlight">
        <h1>All Teachers</h1>
    </div>
    <div class="pt-3 bd-highlight"><a href="{{ route('get_add_teacher') }}" class="btn btn-primary float-right"
            role="button">Add Teacher</a>
    </div>
</div>

<h3>{{ $users->total() }} total users</h3>
<b>In this page {{ $users->count() }} users</b>
@include('includes.success')

<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Status</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Address</th>
            <th scope="col">Birthday</th>
            <th scope="col">Gender</th>
            <th scope="col">Mobile</th>
            <th scope="col">E-mail</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($users)
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->middlename }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->birthday }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->mobile }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('get_edit_teacher', $user->id) }}"> <i class="fa fa-edit"></i> </a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#{{ $user->id }}-delete"><i
                    class="fa fa-trash-alt" aria-hidden="true"></i></button>
            </td>
        </tr>

        @include('admin.modal.delete-modal-teacher')
        
        @endforeach
        @endif

       
    
    </tbody>
</table>

<div class="text-center"> {{ $users->links() }}</div>


@stop