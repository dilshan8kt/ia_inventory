@extends('shared.layout')

@section('title')
  GRN
@endsection

@section('css')
    <link href="{{ asset('plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />    
    <link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

    <style>
		.color{
			background: red;
		}
	</style>
@endsection

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Goods Receive Note</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Goods Receive Note <small></small></h1>
<!-- end page-header -->

<!-- begin panel -->
<div class="invoice">
    <form method="POST" action="{{ route('goods-receive-note') }}" data-parsley-validate="true">
        @csrf
        <div class="invoice-company text-inverse f-w-600">
            <span class="pull-left hidden-print" style="margin-top: -34px;">
                <button type="submit" name="save" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-floppy-o  t-plus-1 text-info fa-fw fa-lg" aria-hidden="true"></i> Save</button>
                <button type="submit" name="cancel" id="cancel" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-ban t-plus-1 text-danger fa-fw fa-lg" aria-hidden="true"></i> Cancel</button>
            </span>
        </div>
    
        <div class="invoice-header" style="margin-top: 21px;margin-bottom: 4px;padding-bottom: 1px;">
            <div class="invoice-from">
                <strong class="text-inverse">Location</strong><br>
                <select class="selectpicker form-control"  data-live-search="true" id="location_id" name="location_id" data-parsley-required="true">
                    <option value="" selected>Select Location</option>
                    @foreach($data->sublocations as $location)
                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="invoice-from">
                <strong class="text-inverse">Supplier</strong><br>
                <select class="selectpicker form-control"  data-live-search="true" id="supplier_id" name="supplier_id" data-parsley-required="true">
                    <option value="" selected>Select Supplier</option>
                    @foreach($data->suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="invoice-from">
                <strong class="text-inverse">Invoice No</strong><br>
                <input type="text" id="invoice_no" name="invoice_no" class="form-control" data-parsley-required="true"/>                
            </div>

            <div class="invoice-from">
                <strong class="text-inverse">GRN Date</strong><br>
                <input type="date" name="grn_date" id="grn_date" class="form-control" data-parsley-required="true">
            </div>
        </div>

        @php
            $tmpsum = 0;
            if($tmpgrn->count() > 0){
                foreach ($tmpgrn as $t) {
                    $tmpsum += ($t->qty * $t->unit_price - $t->dis_amt);
                }
            }
            // dd($tmpsum);
        @endphp

        <div class="invoice-header">
           <!-- begin invoice-price -->
            <div class="invoice-price">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <div class="invoice-price-right" style="padding-top: 29px;">
                            <small>INVOICE NET TOTAL</small> 
                            <span class="f-w-600">
                                <input class="form-control" type="text" id="invoice_total" name="invoice_total" data-parsley-required="true" />
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="invoice-price-right" style="padding-top: 29px;">
                            <small>DISCOUNT</small> 
                            <span class="f-w-600"> 
                                <input class="form-control" type="text" id="discount" name="discount" />
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="invoice-price-right" style="padding-top: 29px;">
                            <small>TAX</small> 
                            <span class="f-w-600"> 
                                <input class="form-control" type="text" id="tax" name="tax"/>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <div class="invoice-price-right" id="net_total_back">
                            <small>NET TOTAL</small> 
                            <input type="hidden" id="h_net_total" value="{{ $tmpsum }}">
                            <span class="f-w-600" id="net_total">LKR 
                                {{ number_format($tmpsum,2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end invoice-price -->
        </div>
        
    </form>
    
    <!-- begin invoice-header -->
    <div class="invoice-header" style="margin-top: 3px;">
        <form id="tmp" method="POST" action="{{ route('tmp-grn') }}" data-parsley-validate="true">
            @csrf
            <div class="row">
                <div id="product" class="form-group col-md-3 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">P.Name</label>
                    <select class="form-control selectpicker" data-live-search="true" id="product_id" name="product_id" data-parsley-required="true">
                        <option value="" selected>Select Product Name</option>
                        @foreach($data->products as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->code }} - {{ $pro->name_eng }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-1 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">Qty</label>
                    <input type="text" id="qty" name="qty" class="form-control" placeholder="0.00" data-parsley-type="number" data-parsley-required="true"/>
                </div>
                <div class="form-group col-md-1 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">F.Qty</label>
                    <input type="text" id="free_qty" name="free_qty" class="form-control" placeholder="0.00" data-parsley-type="number" disabled/>
                </div>
                <div class="form-group col-md-1 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">U.Price</label>
                    <input type="text" id="unit_price" name="unit_price" class="form-control" placeholder="0.00" data-parsley-required="true" disabled/>
                </div>
                <div class="form-group col-md-1 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">S.Price</label>
                    <input type="text" id="sales_price" name="sales_price" class="form-control" placeholder="0.00" data-parsley-required="true" disabled/>
                </div>
                <div class="form-group col-md-1 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">Dis(%)</label>
                    <input type="text" id="dis_p" name="dis_p" class="form-control" placeholder="0.00" disabled/>
                </div>
                <div class="form-group col-md-1 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">Dis(Amt)</label>
                    <input type="text" id="dis_a" name="dis_a" class="form-control" placeholder="0.00" disabled/>
                </div>
                <div class="form-group col-md-2 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <label class="col-form-label">Amount</label>
                    <input type="text" id="amount" name="amount" class="form-control" placeholder="0.00" disabled/>
                </div>
                <div class="form-group col-md-1 col-sm-12" style="padding-left: 3px;padding-right: 3px;">
                    <button type="submit" class="form-control btn btn-success" style="margin-top: 32px;" id="submit">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- end invoice-header -->

    

    <div class="table-responsive">
        <table class="table border">
            <thead>
                <tr>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">#</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Description</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Unit Price</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Sales Price</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Qty</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Free Qty</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Dis(%)</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Dis(Amt)</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Amount</th>
                    <th class="text-center">Option</th>
                </tr>
            </thead>  
            <tbody id="tbody">
                @include('shared.ajax.grndetails')
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->

@include('shared.modal.grn.remove')

@endsection

@section('js')
    <script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/customJS/grn.js') }}"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection