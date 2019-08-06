@extends('layouts.admin')



@section('content')

<h1>Select Quarter</h1>

<div class="row">
    <div class="col-md-12">
        {{-- Includes errors and session flash message display container --}}
        @include('includes.success')

        <div class="row">
            @foreach($quarter as $q)
            <div class="col-lg-3 col-md-6">
                @if($q->finish == 1)
                <div class="panel panel-success">
                    @else
                    @if($q->status == 1)
                    <div class="panel panel-primary">
                        @else
                        <div class="panel panel-warning">
                            @endif
                            @endif
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12">

                                        <div>
                                            @if($q->name == 'first')
                                            First Quarter
                                            @elseif($q->name == 'second')
                                            Second Quarter
                                            @elseif($q->name == 'third')
                                            Third Quarter
                                            @elseif($q->name == 'fourth')
                                            Fourth Quarter
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">
                                        @if($q->finish == 1)
                                        Finished
                                        @else
                                        @if($q->status == 1)
                                        Selected
                                        @else
                                        Unselected
                                        @endif
                                        @endif
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>

                    </div>

                    @endforeach
                    @foreach($quarter as $q)
                    <div class="col-lg-3 col-md-6">
                        <p class="text-center">
                            @if($q->finish == 1)
                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#{{ $q->id }}-reselect">Select Again</button>
                            @include('admin.modal.quarter-reselect-modal')
                            @else
                            @if($q->id == 1 && $q->finish == 0)
                            @if($q->status == 0)
                            <a href="{{ route('select_active_quarter', $q->id) }}"
                                class="btn btn-primary btn-xs">Select</a>
                            @break
                            @elseif($q->status == 1)
                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                data-target="#{{ $q->id }}-finish">Finish</button>
                            @include('admin.modal.quarter-finish-modal')
                            @break
                            @endif

                            @elseif($q->id == 2 && $q->finish == 0)
                            @if($q->status == 0)
                            <a href="{{ route('select_active_quarter', $q->id) }}"
                                class="btn btn-primary btn-xs">Select</a>
                            @break
                            @elseif($q->status == 1)
                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                data-target="#{{ $q->id }}-finish">Finish</button>
                            @include('admin.modal.quarter-finish-modal')
                            @break
                            @endif

                            @elseif($q->id == 3 && $q->finish == 0)
                            @if($q->status == 0)
                            <a href="{{ route('select_active_quarter', $q->id) }}"
                                class="btn btn-primary btn-xs">Select</a>
                            @break
                            @elseif($q->status == 1)
                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                data-target="#{{ $q->id }}-finish">Finish</button>
                            @include('admin.modal.quarter-finish-modal')
                            @break
                            @endif

                            @elseif($q->id == 4 && $q->finish == 0)
                            @if($q->status == 0)
                            <a href="{{ route('select_active_quarter', $q->id) }}"
                                class="btn btn-primary btn-xs">Select</a>
                            @break
                            @elseif($q->status == 1)
                            <!-- <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#{{ $q->id }}-finish">Finish</button> -->
                            @include('admin.modal.quarter-finish-modal')
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
            <p><a href="{{ route('get_select_semester') }}">Click here to select semester...</a></p>
        </div>
    </div>
</div>


@stop