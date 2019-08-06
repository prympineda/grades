<div class="modal modal-danger fade" id="{{ $user->id }}-delete" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                    <h4 class="modal-title">Teacher Removal Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove <strong class="text-capitalize">{{ $user->firstname }} {{ $user->lastname }}?</p>
               
            </div>
            <div class="modal-footer">
                 {{-- Form Deletion --}}
                <form action="{{ route('get_delete_teacher', $user->id) }}" method="GET">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>

    </div>
</div>
