@extends('layouts.admin')

@section('content')
    


<div class="d-flex bd-highlight mb-1">
        <div class="mr-auto p-2 bd-highlight">
                <h1>All Sections</h1>
        </div>
        <div class="pt-3 bd-highlight"><a href="{{ route('get_add_section') }}" class="btn btn-primary float-right"
                role="button">Add Section</a>
        </div>
    </div>
    
    <h3>{{ $sections->total() }} Total Sections</h3>
    <b>In this page {{ $sections->count() }} Sections</b>
    @include('includes.success')
    
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
                    <a href="{{ route('get_edit_section', $section->id) }}"> <i class="fa fa-edit"></i> </a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#{{ $section->id }}-delete"><i
                        class="fa fa-trash-alt" aria-hidden="true"></i></button>
                </td>
            </tr>
    
            @include('admin.modal.delete-modal-section')
    
            @endforeach
    
    
        </tbody>
    
    </table>
    
    <div class="text-center"> {{ $sections->links() }}</div>
    
    



@stop