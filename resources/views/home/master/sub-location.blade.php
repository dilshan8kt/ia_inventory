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
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
        <h4 class="panel-title">Add New Sub Location</h4>
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
                        <a href="" class="btn btn-success fa fa-eye"></a>
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
                            id="aa"
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

@endsection

@section('js')
<script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('plugins/masked-input/masked-input.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>

<script>
    $(document).ready(function() {
        App.init();
        $("#telephone_no").mask("(999) 999-9999")
        $("#telephone_no1").mask("(999) 999-9999")
        $("#data-table-default").length && $("#data-table-default").DataTable({
            responsive: !0,
            "bLengthChange": false,
            "pageLength": 5
        });
        $("#data-table-default_wrapper>div:first-child>div:first-child").addClass('addnew');
        $( ".addnew" ).append( "<button name='add-new-sublocation' data-backdrop='static' data-toggle='modal' data-target='#addSubLocation' id='add-new-sublocation' class='btn btn-primary'>Add New Sub Location</button>");

        $('#editSubLocation').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)

            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            var telephone = button.data('telephone')
            var address = button.data('address')
            var status = button.data('status')

            var modal = $(this)
            modal.find('#id').val(id)
            modal.find('#location_name').val(name)
            modal.find('#description').val(description)
            modal.find('#telephone_no').val(telephone)
            modal.find('#address').val(address)
            modal.find('select[name="status"]').val(status)
        });
    });
</script>
@endsection


@if(session()->has('success'))
    @section('gritter')
        <script>
             $.gritter.add({
                title: 'Successfully',
                text: '{{ session()->get('success') }}',
                time: 8000,
                class_name: 'gritter-info gritter-center'
            });
        </script>
    @endsection
@endif