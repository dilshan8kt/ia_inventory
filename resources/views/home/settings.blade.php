@extends('shared.layout')

@section('title')
  Settings
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
    <li class="breadcrumb-item active">Settings</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Settings <small></small></h1>
<!-- end page-header -->

<!-- begin panel -->

<!-- end panel -->


@endsection

@section('js')
    <script src="{{ asset('plugins/parsley/dist/parsley.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    {{-- <script src="{{ asset('js/customJS/opening-stock.js') }}"></script> --}}

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection