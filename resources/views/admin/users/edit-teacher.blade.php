@extends('layouts.admin')

@section('content')
<h1>Update Teacher</h1>



<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Teacher</div>
            <div class="card-body">
                <form action="{{ route('post_edit_teacher') }}" method="POST" autocomplete="off">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Status</label>
                        <div class="col-md-6">
                            <select name="is_active" class="form-control" id="is_active">
                                <option @if($user->is_active == 1) selected @endif value="1">Active</option>
                                <option @if($user->is_active == 0) selected @endif value="0">Not Active</option>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">First Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}"
                                placeholder="Firt Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Last Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}"
                                placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Middle Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="middlename" value="{{ $user->middlename }}"
                                placeholder="Middle Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-6">
                            <select name="gender" class="form-control" id="gender" required>
                                <option value="">Select Gender...</option>
                                <option @if($user->gender == "Male") selected @endif value="Male">Male</option>
                                <option @if($user->gender == "Female") selected @endif value="Female">Female</option>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Birthday</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="birthday" placeholder="MM/DD/YYYY"
                                value="{{ $user->birthday }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Permanent
                            Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}"
                                placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                placeholder="E-Mail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Phone Number</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" onkeypress="return isNumberKey(event);"
                                name="mobile" maxlength="12" value="{{ $user->mobile }}" placeholder="Mobile Number"
                                required>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $user->id }}" />
                    <div class="col-md-6 offset-md-4">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <a href="{{ route('get_all_teachers') }}" class="btn btn-danger">Cancel</a>
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