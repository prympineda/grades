<div class="modal fade modal-success" id="modal-semester{{ $sem->id }}" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reselect Semester?</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to reslect the Semester?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin_reselect_semester', ['id' => $sem->id]) }}" method="GET">
                        <button type="submit" class="btn btn-success">Continue</button>
                    </form>
                </div>
            </div>
    
        </div>
    </div>
    