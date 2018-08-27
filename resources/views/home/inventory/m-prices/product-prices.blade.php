@extends('shared.layout')

@section('title')
  Manual Product Price
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
        <li class="breadcrumb-item active">Manual Product Price</li>
    </ol>
    <!-- end breadcrumb -->
    
    <!-- begin page-header -->
    <h1 class="page-header">Manual Product Price <small>header small text goes here...</small></h1>
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
            @php
                $no = 1;
            @endphp

            <table id="data-table-default" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap">Cost Price</th>
                        <th class="text-nowrap">Whole Sale Price</th>
                        <th class="text-nowrap">Sales Price</th>
                        <th class="text-nowrap">Date</th>
                        <th class="text-nowrap" width="15%">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prices as $price)
                        <tr class="odd gradeX">
                            <td>{{ $no++ }}</td>
                            <td>{{ number_format($price->cost_price,2) }}</td>
                            <td>{{ number_format($price->ws_price,2) }}</td>
                            <td>{{ number_format($price->sale_price,2) }}</td>
                            <td>{{ $price->grn_date }}</td>
                            <td>
                                <button type="button" 
                                    class="btn btn-danger fa fa-trash"
                                    data-toggle="modal"
                                    data-target="#delete"
                                    data-backdrop="static"
                                    data-id="{{ $price->id }}"
                                ></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->
    
    {{-- @include('shared.modal.department.add') --}}
    {{-- @include('shared.modal.department.edit') --}}
    {{-- @include('shared.modal.department.delete') --}}
    {{-- @include('shared.modal.department.view') --}}
    

@endsection

@section('js')
    <script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/customJS/product-price.js') }}"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection