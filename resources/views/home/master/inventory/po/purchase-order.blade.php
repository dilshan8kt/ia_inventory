@extends('shared.layout')

@section('title')
  Purchase Order
@endsection

@section('css')
<link href="{{ asset('plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Purchase Order</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">New Purchase Order <small>header small text goes here...</small></h1>
<!-- end page-header -->

<!-- begin panel -->
<div class="invoice">
    <!-- begin invoice-header -->
    <div class="invoice-header">
        {{-- <div class="invoice-from">
            <small>from</small>
            <address class="m-t-5 m-b-5">
                <strong class="text-inverse">Twitter, Inc.</strong><br />
                Street Address<br />
                City, Zip Code<br />
                Phone: (123) 456-7890<br />
                Fax: (123) 456-7890
            </address>
        </div> --}}
        {{-- <div class="invoice-to">
            <small>to</small>
            <address class="m-t-5 m-b-5">
                <strong class="text-inverse">Company Name</strong><br />
                Street Address<br />
                City, Zip Code<br />
                Phone: (123) 456-7890<br />
                Fax: (123) 456-7890
            </address>
        </div> --}}
        {{-- <div class="invoice-date">
            <small>Invoice / July period</small>
            <div class="date text-inverse m-t-5">August 3,2012</div>
            <div class="invoice-detail">
                #0000123DSS<br />
                Services Product
            </div>
        </div> --}}
    </div>
    <!-- end invoice-header -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Cost Price</th>
                    <th>Total Amount</th>
                    <th>Option</th>
                </tr>
            </thead>  
            <tbody>
                <tr>
                    <td>,ad</td>
                    <td>sdfs</td>
                    <td>sfrte</td>
                    <td>ghjghj</td>
                    <td>ertert</td>
                    <td>
                        <button type="button" class="btn btn-danger fa fa-times"></button>
                    </td>
                </tr>
                <tr>
                    <form action="" data-parsley-validate="true">
                    <td>
                        <select class="search-combo form-control" id="product_code" name="product_code"  data-parsley-required="true">
                            <option value="" selected>Select Product Code</option>
                            @foreach($products as $pro)
                                <option value="{{ $pro->id }}">{{ $pro->code }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search-combo form-control" id="product_name" name="product_name"  data-parsley-required="true">
                            <option value="" selected>Select Product Name</option>
                            @foreach($products as $pro)
                                <option value="{{ $pro->id }}">{{ $pro->name_eng }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" id="quantity" class="form-control" />
                    </td>
                    <td>
                        <input type="text" id="cost_price" class="form-control" placeholder="0.00" readonly/>
                    </td>
                    <td>
                        <input type="text" id="total_amount" class="form-control" readonly/>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                </form>
            </tbody>
        </table>
    </div>
    <!-- begin invoice-price -->
    <div class="invoice-price">
        <div class="invoice-price-left">
            {{-- <div class="invoice-price-row">
                <div class="sub-price">
                    <small>SUBTOTAL</small>
                    <span class="text-inverse">$4,500.00</span>
                </div>
                <div class="sub-price">
                    <i class="fa fa-plus text-muted"></i>
                </div>
                <div class="sub-price">
                    <small>PAYPAL FEE (5.4%)</small>
                    <span class="text-inverse">$108.00</span>
                </div>
            </div> --}}
        </div>
        <div class="invoice-price-right">
            <small>TOTAL</small> <span class="f-w-600">LKR 4508.00</span>
        </div>
    </div>
    <!-- end invoice-price -->

    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-8">
            <button class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export as PDF</button>
            <button class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</button>
        </div>
    </div>
</div>
<!-- end panel -->

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
{{-- <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script> --}}
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('js/customJS/po.js') }}"></script>


<script>
    $(document).ready(function() {
        App.init();
        $(".search-combo").select2();
    });
</script>
@endsection