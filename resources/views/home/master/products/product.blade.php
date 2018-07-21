@extends('shared.layout')

@section('title')
  Product Details
@endsection

@section('css')
<link href="{{ asset('plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Product</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Product <small>header small text goes here...</small></h1>
<!-- end page-header -->

<!-- begin panel -->
<div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading" style="padding-bottom: 29px;">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
    </div>
    <!-- end panel-heading -->
    
    <div class="panel-body">
        <table id="data-table-default" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">Product Code</th>
                    <th class="text-nowrap">Barcode</th>
                    <th class="text-nowrap">Product Name</th>
                    <th class="text-nowrap">Unit</th>
                    <th class="text-nowrap" width="15%">Status</th>
                    <th class="text-nowrap" width="15%">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="odd gradeX">
                    <td>{{ $product->code }}</td>
                    <td>
                        @if($product->barcode_1 != null)
                            <h5><span class="label label-warning">{{ $product->barcode_1 }}</span></h5>
                        @endif
                        @if($product->barcode_2 != null)
                            <h5><span class="label label-warning">{{ $product->barcode_2 }}</span></h5>
                        @endif
                    </td>
                    <td>
                        {{ $product->name_eng }} <br>
                        {{ $product->name_sin }}
                    </td>
                    <td>{{ $product->unit }}</td>
                    <td>
                        @if($product->status === 1)
                            <h5><lable class="label label-success">Active</lable></h5>
                        @elseif($product->status === 0)
                            <h5><lable class="label label-danger">Deactive</lable></h5>
                        @endif
                    </td>
                    <td>
                        <button type="button" 
                            class="btn btn-success fa fa-eye"
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#view"
                            data-id="{{ $product->id }}"
                            data-depid="{{ $product->department_id }}"
                            data-catid="{{ $product->category_id }}"
                            data-supid="{{ $product->supplier_id }}"
                            data-code="{{ $product->code }}"
                            data-barcode1="{{ $product->barcode_1 }}"
                            data-barcode2="{{ $product->barcode_2 }}"
                            data-nameeng="{{ $product->name_eng }}"
                            data-namesin="{{ $product->name_sin }}"
                            data-nameunit="{{ $product->unit }}"
                            data-status="{{ $product->status }}"
                            data-reorder="{{ $product->reorder }}"
                        ></button>
                        <button type="button" 
                            class="btn btn-info fa fa-edit" 
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#edit"
                            data-id="{{ $product->id }}"
                            data-depid="{{ $product->department_id }}"
                            data-catid="{{ $product->category_id }}"
                            data-supid="{{ $product->supplier_id }}"
                            data-code="{{ $product->code }}"
                            data-barcode1="{{ $product->barcode_1 }}"
                            data-barcode2="{{ $product->barcode_2 }}"
                            data-nameeng="{{ $product->name_eng }}"
                            data-namesin="{{ $product->name_sin }}"
                            data-nameunit="{{ $product->unit }}"
                            data-status="{{ $product->status }}"
                            data-reorder="{{ $product->reorder }}"
                        ></button>
                        <button type="button" 
                            class="btn btn-danger fa fa-trash"
                            data-toggle="modal"
                            data-target="#delete"
                            data-backdrop="static"
                            data-id="{{ $product->id }}"
                        ></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->

@include('shared.modal.product.add')
@include('shared.modal.product.edit')
@include('shared.modal.product.delete')
@include('shared.modal.product.view')

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/customJS/product.js') }}"></script>


<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection