@extends('shared.layout')

@section('title')
  Stock Details
@endsection

@section('css')
<link href="{{ asset('plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Stock</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Stock Adjustment Note<small></small></h1>
<!-- end page-header -->

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <label>Item Code</label>
                <select class="form-control selectpicker" id="item_code" name="item_code" data-size="10" data-live-search="true">
                    <option value="" selected>Select Item Code</option>
                    @foreach($items as $itm)
                        <option value="{{ $itm->id }}">{{ $itm->code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label>Item Name</label>
                <select class="form-control selectpicker" id="item_name" name="item_name" data-size="10" data-live-search="true">
                    <option value="" selected>Select Item Name</option>
                    @foreach($items as $itm)
                        <option value="{{ $itm->id }}">{{ $itm->name_eng }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1">
                <label>Quantity</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-2">
                <label>Cost Price</label>
                <input type="text" id="cost_price" class="form-control" placeholder="0.00" />
            </div>
            <div class="col-md-2">
                <label>W/S Price</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-2">
                <label>Selling Price</label>
                <input type="text" class="form-control" />
            </div>
            <div class="col-md-1">
                <input type="button" class="btn btn-success" value="Add"/>
            </div>
        </div>
        <hr>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Cost Price</th>
                        <th>W/S Price</th>
                        <th>Selling Price</th>
                        <th>Option</th>
                    </tr>
                </thead>            </table>
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
<script src="{{ asset('plugins/bootstrap-combobox/js/bootstrap-combobox.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/customJS/stock.js') }}"></script>


<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection