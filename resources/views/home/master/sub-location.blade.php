@extends('shared.layout')

@section('title')
  Sub Location
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
    <li class="breadcrumb-item active">Sub Location</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Sub Location <small>header small text goes here...</small></h1>
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
                    <th class="text-nowrap">Location Name</th>
                    <th class="text-nowrap">Description</th>
                    <th class="text-nowrap" width="15%">Status</th>
                    <th class="text-nowrap" width="15%">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sublocations as $sl)
                <tr class="odd gradeX">
                    <td>{{ $sl->location_name }}</td>
                    <td>{{ $sl->description }}</td>
                    <td>
                        @if($sl->status === 1)
                            <lable class="label label-success">Active</lable>
                        @elseif($sl->status === 0)
                            <lable class="label label-danger">Deactive</lable>
                        @endif
                    </td>
                    <td>
                        <button type="button" 
                            class="btn btn-success fa fa-eye"
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#viewSubLocation"
                            data-id="{{ $sl->id }}"
                            data-name="{{ $sl->location_name }}"
                            data-description="{{ $sl->description }}"
                            data-telephone="{{ $sl->telephone_no }}"
                            data-address="{{ $sl->address }}"
                            data-status="{{ $sl->status }}"></button>
                        <button type="button" 
                            class="btn btn-info fa fa-edit" 
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#editSubLocation"
                            data-id="{{ $sl->id }}"
                            data-name="{{ $sl->location_name }}"
                            data-description="{{ $sl->description }}"
                            data-telephone="{{ $sl->telephone_no }}"
                            data-address="{{ $sl->address }}"
                            data-status="{{ $sl->status }}"></button>
                        <button type="button" 
                            class="btn btn-danger fa fa-trash"
                            data-toggle="modal"
                            data-target="#deleteSubLocation"
                            data-backdrop="static"
                            data-id="{{ $sl->id }}"></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->

@include('shared.modal.sublocation.add')
@include('shared.modal.sublocation.edit')
@include('shared.modal.sublocation.delete')
@include('shared.modal.sublocation.view')

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/customJS/sublocation.js') }}"></script>


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