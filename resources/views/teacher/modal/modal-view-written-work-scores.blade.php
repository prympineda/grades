<div class="modal fade modal-default" id="score-{{ $x }}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Written Work Number {{ $x }}</h4>

            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Score</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scores as $score)
                        <tr>
                            @if($x == $score->written_work_number)
                            <td>{{ ucwords($score->student->user->firstname . ' ' . $score->student->user->lastname)  }}</td>
                            <td>{{ $score->score }}</td>
                            <td>{{ $score->total }}</td>
                            <td><a href="{{ route('update_written_work_score', ['id' => $score->id, 'user_id' => $score->student->user_id]) }}" class="btn btn-primary btn-xs">Change Score</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
