{{--  <div id="DeleteModal" class="modal fade text-danger" role="dialog">
        <div class="modal-dialog ">
          <!-- Modal content-->
          <form action="" id="deleteForm" method="post">
              <div class="modal-content">
                  <div class="modal-header bg-danger">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
{{ method_field('DELETE') }}
<p class="text-center">Are You Sure Want To Delete {{ $user->firstname }}?</p>
</div>
<div class="modal-footer">
    <center>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes,
            Delete</button>
    </center>
</div>
</div>
</form>
</div>
</div> --}}

{{--  <!-- Modal -->  --}}
{{--  <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
              
               <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <form action="{{route('get_delete_admin', $user->id)}}" method="post">
{{method_field('delete')}}
{{csrf_field()}}
<div class="modal-body">
    <p class="text-center">
        Are you sure you want to delete this {{ $user->firstname }}?
    </p>
    <input type="hidden" name="id" id="id" value="">

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
    <button type="submit" class="btn btn-warning">Yes, Delete</button>
</div>
</form>
</div>
</div>
</div> --}}


{{--  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>  --}}


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
                    <form action="{{ route('get_delete_admin', $user->id) }}" method="GET">
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>
    
        </div>
    </div>
    