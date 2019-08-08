@extends('layouts.teacher')



@section('content')

<h1>Update Written Work Scores</h1>
@include('includes.success')
<h4>{{ ucwords($student->firstname . ' ' . $student->lastname) }}</h4>
<div class="row">
    <div class="col-md-4">
        <form action="{{ route('post_update_written_work_score') }}" method="POST" autocomplete="off">
            <div class="form-group">
                <p><strong>Total: {{ $score->total }}</strong></p>
                <input type="hidden" name="total" value="{{ $score->total }}" />
            </div>

            <div class="form-group">
                <input type="number" name="score" class="form-control"
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $score->score }}"
                    max="{{ $score->total }}" required="" />
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $score->id }}" />
                <input type="hidden" name="user_id" value="{{ $student->user_id }}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-primary">Update Score</button>
            </div>

        </form>
    </div>
</div>
@stop