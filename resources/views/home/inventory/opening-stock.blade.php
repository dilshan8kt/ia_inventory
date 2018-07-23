@extends('shared.layout')

@section('title')
  Open Stock
@endsection

@section('css')

@endsection

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Opening Stock</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Opening Stock <small></small></h1>
<!-- end page-header -->

<!-- begin panel -->
<div class="invoice">
    <form action="" method="POST" data-parsley-validate="true">
        @csrf
        <div class="invoice-company text-inverse f-w-600">
            <span class="pull-left hidden-print" style="margin-top: -34px;">
                <button type="submit" name="save" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-floppy-o  t-plus-1 text-info fa-fw fa-lg" aria-hidden="true"></i> Save</button>
                <button type="submit" name="cancel" id="cancel" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-ban t-plus-1 text-danger fa-fw fa-lg" aria-hidden="true"></i> Cancel</button>
            </span>
        </div>
    
        <!-- begin invoice-header -->
        <div class="invoice-header" style="margin-top: 21px;margin-bottom: 4px;">
            <div class="invoice-from">
                <strong class="text-inverse">Location</strong><br>
                <select class="selectpicker form-control col-sm-6"  data-live-search="true" id="supplier_id" name="supplier_id" data-parsley-required="true">
                    <option value="" selected>Select Location</option>
                    @foreach($data->sublocations as $location)
                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="invoice-date">
                <div class="date text-inverse m-t-5">{{ \Carbon\Carbon::now()->toFormattedDateString() }}</div>
            </div>
        </div>
    </form>
    
    <!-- begin invoice-header -->
    <div class="invoice-header">
        <form id="tmp" method="POST" data-parsley-validate="true">
            @csrf
            <div class="row">
                <div id="p_code" class="form-group col-md-2 col-sm-12">
                    <label class="col-form-label">P.Code</label>
                    <select class="selectpicker form-control" data-live-search="true" id="product_id" name="product_id" data-parsley-required="true">
                        <option value="" selected>Select Product Code</option>
                        {{-- @foreach($products as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->code }}</option>
                        @endforeach --}}
                    </select>
                </div>
                
                <div id="p_name" class="form-group col-md-3 col-sm-12">
                    <label class="col-form-label">P.Name</label>
                    <select class="form-control selectpicker" data-live-search="true" id="product_name" name="product_name" data-parsley-required="true">
                        <option value="" selected>Select Product Name</option>
                        {{-- @foreach($products as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->name_eng }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-12">
                    <label class="col-form-label">Qty</label>
                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="0.00" data-parsley-type="number" data-parsley-required="true"/>
                </div>
                <div class="form-group col-md-2 col-sm-12">
                    <label class="col-form-label">U.Price</label>
                    <input type="text" id="unit_price" name="unit_price" class="form-control" placeholder="0.00" data-parsley-required="true"/>
                </div>
                <div class="form-group col-md-2 col-sm-12">
                    <label class="col-form-label">Total</label>
                    <input type="text" id="total_amount" class="form-control" placeholder="0.00" readonly/>
                </div>
                <div class="form-group col-md-1 col-sm-12">
                    <button type="submit" class="btn btn-success" style="margin-top: 32px;" id="submit">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
                {{-- @php
                    $total = 0;
                    
                    foreach($tmppo as $t){
                        $total += ($t->unit_price * $t->quantity);
                        // dd($total);
                    }
                @endphp --}}
                {{-- <input type="hidden" id="h-total" value="{{ $total }}"> --}}
            </div>
        </form>
    </div>
    <!-- end invoice-header -->

    

    <div class="table-responsive">
        <table class="table border">
            <thead>
                <tr>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">#</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Code</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Name</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Quantity</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Cost Price</th>
                    <th class="text-center" style="border-right-width: 1px;border-right-style: solid;">Total Amount</th>
                    <th class="text-center">Option</th>
                </tr>
            </thead>  
            <tbody id="tbody">
                {{-- @include('shared.ajax.podetails') --}}
            </tbody>
        </table>
    </div>
    <!-- begin invoice-price -->
    <div class="invoice-price">
        <div class="invoice-price-left">
        </div>
        <div class="invoice-price-right">
            <small>TOTAL</small> 
            <span class="f-w-600" id="total">LKR 
                {{-- {{ number_format($total,2) }} --}}
            </span>
            
        </div>
    </div>
    <!-- end invoice-price -->
</div>
<!-- end panel -->
    
@endsection

@section('js')

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection