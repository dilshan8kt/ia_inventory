<div class="modal fade" id="remove" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-danger">Are you sure?</h4>
            </div>
            <form action="{{ route('tmp-po') }}" method="post" id="tmp_remove">
                @method('delete')
                @csrf
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="qty" id="qty">
                <input type="hidden" name="unitprice" id="unitprice">
            
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">No</a>
                    <button class="btn btn-danger" type="submit">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>