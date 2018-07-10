@extends('shared.layout')

@section('title')
  Users
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
    <li class="breadcrumb-item active">Users</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Users <small>you can Add|Edit|Update|Delete in users </small></h1>
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
                    <th class="text-nowrap">User Name</th>
                    <th class="text-nowrap">Phone No</th>
                    <th class="text-nowrap">Role</th>
                    <th class="text-nowrap" width="15%">Status</th>
                    <th class="text-nowrap" width="15%">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="odd gradeX">
                    <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->telephone_no }}</td>
                    <td>{{ $user->role($user->id) }}</td>
                    <td>
                        @if($user->status === 1)
                            <lable class="label label-success">Active</lable>
                        @elseif($user->status === 0)
                            <lable class="label label-danger">Deactive</lable>
                        @endif
                    </td>
                    <td>
                        <button type="button"
                            class="btn btn-success fa fa-eye"
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#view"
                            data-fname="{{ $user->first_name }}"
                            data-mname="{{ $user->middle_name }}"
                            data-lname="{{ $user->last_name }}"
                            data-phone="{{ $user->telephone_no }}"
                            data-username="{{ $user->username }}"
                            data-role="{{ $user->role($user->id) }}"
                            data-status="{{ $user->status }}"
                        ></button>
                        <button type="button"
                            class="btn btn-info fa fa-edit"
                            data-backdrop="static"
                            data-toggle="modal"
                            data-target="#edit"
                            data-id="{{ $user->id }}"
                            data-fname="{{ $user->first_name }}"
                            data-mname="{{ $user->middle_name }}"
                            data-lname="{{ $user->last_name }}"
                            data-phone="{{ $user->telephone_no }}"
                            data-role="{{ $user->roles }}"
                            data-status="{{ $user->status }}"
                        ></button>
                        <button type="button"
                            class="btn btn-danger fa fa-trash"
                            data-toggle="modal"
                            data-target="#delete"
                            data-backdrop="static"
                            data-id="{{ $user->id }}"
                        ></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->

@include('shared.modal.users.add')
@include('shared.modal.users.edit')
@include('shared.modal.users.delete')
@include('shared.modal.users.view')

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/customJS/users.js') }}"></script>


<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection