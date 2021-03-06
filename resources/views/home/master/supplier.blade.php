@extends('shared.layout')

@section('title')
  Supplier
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
    <li class="breadcrumb-item active">Supplier</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Supplier <small>you can Add|Edit|Update|Delete in suppliers </small></h1>
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
                    <th class="text-nowrap">Supplier Code</th>
                    <th class="text-nowrap">Supplier Name</th>
                    <th class="text-nowrap">Company Name</th>
                    <th class="text-nowrap" width="15%">Status</th>
                    <th class="text-nowrap" width="15%">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr class="odd gradeX">
                    <td>{{ $supplier->code }}</td>
                    <td>{{ $supplier->ref_name }}</td>
                    <td>{{ $supplier->company_name }}</td>
                    <td>
                        @if($supplier->status === 1)
                            <lable class="label label-success">Active</lable>
                        @elseif($supplier->status === 0)
                            <lable class="label label-danger">Deactive</lable>
                        @endif
                    </td>
                    <td>
                        <button type="button" 
                            class="btn btn-success fa fa-eye"
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#view"
                            data-code="{{ $supplier->code }}"
                            data-refname="{{ $supplier->ref_name }}"
                            data-companyname="{{ $supplier->company_name }}"
                            data-address="{{ $supplier->address }}"
                            data-phone1="{{ $supplier->phone1 }}"
                            data-phone2="{{ $supplier->phone2 }}"
                            data-email="{{ $supplier->email }}"
                            data-status="{{ $supplier->status }}"
                        ></button>
                        <button type="button" 
                            class="btn btn-info fa fa-edit" 
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#edit"
                            data-id="{{ $supplier->id }}"
                            data-code="{{ $supplier->code }}"
                            data-refname="{{ $supplier->ref_name }}"
                            data-companyname="{{ $supplier->company_name }}"
                            data-address="{{ $supplier->address }}"
                            data-phone1="{{ $supplier->phone1 }}"
                            data-phone2="{{ $supplier->phone2 }}"
                            data-email="{{ $supplier->email }}"
                            data-status="{{ $supplier->status }}"
                        ></button>
                        <button type="button" 
                            class="btn btn-danger fa fa-trash"
                            data-toggle="modal"
                            data-target="#delete"
                            data-backdrop="static"
                            data-id="{{ $supplier->id }}"
                        ></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->

@include('shared.modal.supplier.add')
@include('shared.modal.supplier.edit')
@include('shared.modal.supplier.delete')
@include('shared.modal.supplier.view')

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/customJS/supplier.js') }}"></script>


<script>
    $(document).ready(function() {
        App.init();
    });
</script>

@if($errors->any())
<script>
    $(window).on('load',function(){
        console.log('ahgsd');
        $('#addSubLocation').modal('show');
    });
</script>
@endif

@endsection