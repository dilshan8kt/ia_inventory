@extends('site_administration.shared.layout')

@section('title')
  Clients
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
    <li class="breadcrumb-item active">Clients</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Clients <small></small></h1>
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
                    <th class="text-nowrap">ID</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Telephone No</th>
                    <th class="text-nowrap" width="15%">Status</th>
                    <th class="text-nowrap" width="15%">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr class="odd gradeX">
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->company_name }}</td>
                    <td>{{ $client->telephone_no }}</td>
                    <td>
                        @if($client->status === 1)
                            <lable class="label label-success">Active</lable>
                        @elseif($client->status === 0)
                            <lable class="label label-danger">Deactive</lable>
                        @endif
                    </td>
                    <td>
                        <button type="button" 
                            class="btn btn-success fa fa-eye"
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#view"
                            data-companyname="{{ $client->company_name }}"
                            {{-- data-fname="{{ $client->id }}"
                            data-mname="{{ $client->id }}"
                            data-lname="{{ $client->id }}" --}}
                            data-aline1="{{ $client->address_line1 }}"
                            data-aline2="{{ $client->address_line2 }}"
                            data-aline3="{{ $client->address_line3 }}"
                            data-telephoneno="{{ $client->telephone_no }}"
                            data-email="{{ $client->email }}"
                            data-status="{{ $client->status }}"
                        ></button>
                        <button type="button" 
                            class="btn btn-info fa fa-edit" 
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#edit"
                            data-id="{{ $client->id }}"
                        ></button>
                        <button type="button" 
                            class="btn btn-danger fa fa-trash"
                            data-toggle="modal"
                            data-target="#delete"
                            data-backdrop="static"
                            data-id="{{ $client->id }}"
                        ></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->

@include('site_administration.modal.client.add')
{{-- @include('shared.modal.supplier.edit') --}}
{{-- @include('shared.modal.supplier.delete') --}}
@include('site_administration.modal.client.view')

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/customJS/site/clients.js') }}"></script>


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