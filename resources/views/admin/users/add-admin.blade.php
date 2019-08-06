@extends('layouts.admin')

@section('content')

<h1>Add Admin</h1>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Admin</div>
            <div class="card-body">
                    @include('includes.success')
                <form action="{{ route('post_add_admin') }}" method="POST" autocomplete="off">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">First Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}"
                                placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Last Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"
                                placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Middle Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="middlename" value="{{ old('middlename') }}"
                                placeholder="Middle Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-6">
                            <select name="gender" class="form-control" value="{{ old('gender') }}" required>
                                <option value="">Select Gender...</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : ''}}> Male </option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}> Female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Birthday</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="birthday" placeholder="MM/DD/YYYY"
                                value="{{ old('birthday') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Permanent
                            Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="E-Mail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Phone Number</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" onkeypress="return isNumberKey(event);"
                                name="mobile" maxlength="12" value="{{ old('mobile') }}" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <a href="{{ route('get_all_admins') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
            @include('includes.error_form')

        </div>
    </div>
</div>
</div>
<script>
    function isNumberKey(evt)
        {
          var charCode = (evt.which) ? evt.which : event.keyCode;
         console.log(charCode);
            if (charCode != 43 && charCode != 45 && charCode > 31
            && (charCode < 48 || charCode > 57 ))
             return false;
        
          return true;
        }
</script>

@stop