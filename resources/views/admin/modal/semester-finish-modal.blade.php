<div class="modal fade modal-success" id="{{ $sem->id }}-finish" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Finish Semester?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to finished the semester?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('finish_selected_semester', $sem->id) }}" method="GET">
                        <button type="submit" class="btn btn-success">Finish</button>
                    </form>
                </div>
            </div>
    
        </div>
    </div>
    