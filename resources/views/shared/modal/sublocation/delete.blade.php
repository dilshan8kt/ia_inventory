<div class="modal modal-message fade" id="delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure, you wanna delete this record?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h5 class="text-danger">If you delete this reord you can't bring it back</h5>
            </div>
            <form action="{{ route('sublocation') }}" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" id="id">
            
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>