<div class="modal fade" id="print_pdf" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Purchase Order</h4>
            </div>
            <div class="modal-body">
                <h5 class="text-info">Export Report as PDF or Print Directly</h5>
            </div>
            <form action="{{ route('purchase-order') }}" method="post">
                @csrf
                @if(session()->has('print-pdf'))
                    <input type="hidden" name="id" id="id" value="{{ session()->get('print-pdf') }}">
                @endif
            
                <div class="modal-footer">
                    <button type="submit" name="pdf" id="pdf" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file-pdf-o t-plus-1 text-danger fa-fw fa-lg" aria-hidden="true"></i> Export as PDF</button>
                    <button type="submit" name="print" id="print" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 text-info fa-fw fa-lg" aria-hidden="true"></i> Print</button>                    
                    <a class="btn btn-sm btn-white m-b-10 p-l-5" data-dismiss="modal"><i class="fa fa-ban t-plus-1 text-danger fa-fw fa-lg" aria-hidden="true"></i> Close</a>
                </div>
            </form>
        </div>
    </div>
</div>