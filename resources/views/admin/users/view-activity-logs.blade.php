@extends('layouts.admin')

@section('content')

<h1>Activity Logs</h1>

<h3>{{ $logs->total() }} Total Logs</h3>
<b>In this page {{ $logs->count() }} Logs</b>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Role</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
            <th scope="col">Date and Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
        <tr>
            <td>  @if($log->user->role_id=='1')
                    Admin
                    @elseif($log->user->role_id=='2')
                    Teacher
                    @else
                    Student
                    @endif 
                   

            </td>
            <td>{{ $log->user->firstname }} {{ $log->user->lastname }}</td>
            <td>{{ $log->action }}</td>
            <td>{{ $log->created_at }}</td </tr> 
        @endforeach 
    </tbody>
</table> 

<div class="text-center"> {{ $logs->links() }}</div>


@stop