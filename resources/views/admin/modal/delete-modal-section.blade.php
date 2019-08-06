<div class="modal fade modal-danger" id="{{ $section->id }}-remove" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Section Confirmation Removal</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove this section: <strong class="text-capitalize">{{ $section->grade_level->name }} - {{ $section->name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                 {{-- Form Deletion --}}
                <form action="{{ route('get_delete_section', $section->id ) }}" method="GET">
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>

    </div>
</div>
