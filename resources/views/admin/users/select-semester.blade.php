@extends('layouts.admin')



@section('content')

<h1>Select Semester</h1>

<div class="row">
    <div class="col-md-12">
        {{-- Includes errors and session flash message display container --}}
        @include('includes.success')
        <div class="row">
            @foreach($semester as $sem)
            <div class="col-md-3">
                @if($sem->finish == 1)
                <div class="panel panel-success">
                    @else
                    @if($sem->status == 1)
                    <div class="panel panel-primary">
                        @else
                        <div class="panel panel-warning">
                            @endif
                            @endif
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div>
                                            @if($sem->name == 'first')
                                            First Semester
                                            @elseif($sem->name == 'second')
                                            Second Semester
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                @if($sem->status == 1)
                                Selected
                                @else
                                @if($sem->finish == 1)
                                Finished
                                @else
                                Unselected
                                @endif
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">

                    @foreach($semester as $sem)
                    <div class="col-lg-3">
                        <p class="text-center">
                            @if($sem->finish == 1)
                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#modal-semester{{ $sem->id }}">Select Again</button>
                            @include('admin.modal.semester-reselect-modal')
                            @else
                            @if($sem->id == 1 && $sem->finish == 0)
                            @if($sem->status == 0)
                            <a href="{{ route('select_active_semester', $sem->id) }}"
                                class="btn btn-primary btn-xs">Select</a>
                            @break
                            @elseif($sem->status == 1)
                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                data-target="#{{ $sem->id }}-finish">Finish</button>
                            @include('admin.modal.semester-finish-modal')
                            @break
                            @endif

                            @elseif($sem->id == 2 && $sem->finish == 0)
                            @if($sem->status == 0)
                            <a href="{{ route('select_active_semester', $sem->id) }}"
                                class="btn btn-primary btn-xs">Select</a>
                            @break
                            @elseif($sem->status == 1)
                            <!-- <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#{{ $sem->id }}-finish">Finish</button> -->
                            @include('admin.modal.semester-finish-modal')
                            @break
                            @endif

                            @endif
                            @endif
                        </p>
                    </div>

                    @endforeach
                </div>

            </div>
            <br><br>
            <p><a href="{{ route('get_select_quarter') }}">Click here to select quarter...</a></p>
        </div>
    </div>
</div>





@stop