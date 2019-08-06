@extends('layouts.admin')


@section('content')

<h1>Update Student</h1>


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Student</div>
            <div class="card-body">
                <form action="{{ route('post_edit_student') }}" method="POST" autocomplete="off">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Section</label>
                        <div class="col-md-6">
                            <select name="section" id="" class="form-control" required>
                                <option value="">Select Grade Level &amp; Section</option>
                                @foreach($section as $s)
                                <option @if($s->id == $student->info->section_id) selected @endif
                                    value="{{ $s->id }}">{{ ucwords($s->grade_level->name) }} - {{ ucwords($s->name) }}
                                </option>
                                @endforeach
                                @if(count($section) == 0)
                                <option value="">No Section Added</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Status</label>
                        <div class="col-md-6">
                            <select name="is_active" class="form-control" id="is_active">
                                <option @if($student->is_active == 1) selected @endif value="1">Active</option>
                                <option @if($student->is_active == 0) selected @endif value="0">Not Active</option>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">First Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstname" value="{{ $student->firstname }}"
                                placeholder="Firt Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Last Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastname" value="{{ $student->lastname }}"
                                placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Middle Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="middlename" value="{{ $student->middlename }}"
                                placeholder="Middle Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-6">
                            <select name="gender" class="form-control" id="gender" required>
                                <option value="">Select Gender...</option>
                                <option @if($student->gender == "Male") selected @endif value="Male">Male</option>
                                <option @if($student->gender == "Female") selected @endif value="Female">Female</option>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Birthday</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="birthday" placeholder="MM/DD/YYYY"
                                value="{{ $student->birthday }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Permanent
                            Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" value="{{ $student->address }}"
                                placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ $student->email }}"
                                placeholder="E-Mail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Phone Number</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" onkeypress="return isNumberKey(event);"
                                name="mobile" maxlength="12" value="{{ $student->mobile }}" placeholder="Mobile Number"
                                required>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $student->id }}" />
                    <div class="col-md-6 offset-md-4">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <a href="{{ route('get_all_students') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
            @include('includes.error_form')

        </div>
    </div>
</div>
</div>


@stop