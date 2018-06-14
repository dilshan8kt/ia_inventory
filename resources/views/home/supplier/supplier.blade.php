@extends('shared.layout')

@section('title')
  Supplier Details
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
<h1 class="page-header">Supplier Details <small>header small text goes here...</small></h1>
<!-- end page-header -->

<!-- begin panel -->
<div class="panel panel-inverse">
     <!-- begin panel-heading -->
     <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
        <h4 class="panel-title">Add New Supplier</h4>
    </div>
    <!-- end panel-heading -->

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="" data-parsley-validate="true">
            @csrf
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label" for="name">Category Name * :</label>
                <div class="col-md-8 col-sm-8">
                    <input class="form-control {{ $errors->has('name') ? ' parsley-error' : '' }}" value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Supplier Category Name" data-parsley-required="true" />
                    
                    @if ($errors->has('name'))
                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                            <li class="parsley-required">{{ $errors->first('name') }}</li>
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label" for="description">Description :</label>
                <div class="col-md-8 col-sm-8">
                    <textarea class="form-control {{ $errors->has('description') ? ' parsley-error' : '' }}" id="description" name="description" rows="2" data-parsley-required="true" placeholder="Description">{{ old('description') }}</textarea>
                    
                    @if ($errors->has('description'))
                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                            <li class="parsley-required">{{ $errors->first('description') }}</li>
                        </ul>
                    @endif
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-md-4 col-sm-4 col-form-label">Staus :</label>
                <div class="col-md-8 col-sm-8">
                    <select class="form-control" id="select-required" name="status" data-parsley-required="true">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group row m-b-0">
                <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                <div class="col-md-8 col-sm-8">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end panel -->

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-body">
        <table id="data-table-default" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-nowrap">Category Name</th>
                    <th class="text-nowrap">Description</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap" width="15%">Option</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($supplier_category as $sc)
                <tr class="odd gradeX">
                    <td>{{ $sc->name }}</td>
                    <td>{{ $sc->description }}</td>
                    <td>{{ $sc->status }}</td>
                    <td>
                        <a href="" class="btn btn-success fa fa-eye"></a>
                        <a href="" class="btn btn-info fa fa-edit"></a>
                        <a href="" class="btn btn-danger fa fa-trash"></a>
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>

<script>
    $(document).ready(function() {
        App.init();
        // $("#data-table-default").length && $("#data-table-default").DataTable({
        //     responsive: !0,
        //     "bLengthChange": false,
        //     "pageLength": 3
        // })
    });
</script>
@endsection


{{-- @if(session()->has('success'))
    @section('gritter')
        <script>
             $.gritter.add({
                title: 'Supplier Category',
                text: '{{ session()->get('success') }}',
                time: 8000,
                class_name: 'gritter-info gritter-center'
            });
        </script>
    @endsection
@endif --}}