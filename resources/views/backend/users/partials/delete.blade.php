@if($user->id != Auth::user()->id)
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="modal_Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">
                        Cancel
                    </span>
                </button>
                <h4 class="modal-title" id="modal_Label"> Delete User</h4>
            </div>
            {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}

            <div class="modal-body">
                <p> Do you really want to delete this user?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                <button type="submit" class="btn btn-danger"> Delete</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endif