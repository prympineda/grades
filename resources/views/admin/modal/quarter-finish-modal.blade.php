<div class="modal fade modal-success" id="{{ $q->id }}-finish" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Finish Quarter?</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to finished the quarter?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('finish_selected_quarter', $q->id) }}" method="GET">
                    <button type="submit" class="btn btn-success">Finish</button>
                </form>
            </div>
        </div>

    </div>
</div>
