@extends('shared.layout')

@section('title')
  Purchase Order
@endsection

@section('css')
    <link href="{{ asset('plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
    <li class="breadcrumb-item active">Purchase Orders</li>
</ol>
<!-- end breadcrumb -->

<!-- begin page-header -->
<h1 class="page-header">Purchase Orders <small></small></h1>
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
                    <th class="text-nowrap">PO Code</th>
                    <th class="text-nowrap">Supplier</th>
                    <th class="text-nowrap">Date</th>
                    <th class="text-nowrap">Remarks</th>
                    <th class="text-nowrap" width="120px">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($po as $p)
                <tr class="odd gradeX">
                    <td>{{ $p->code }}</td>
                    <td>{{ $p->supplier->code }} - {{ $p->supplier->company_name }}</td>
                    <td>{{ $p->created_at->toFormattedDateString() }}</td>
                    <td>{{ $p->remarks }}</td>
                    <td>
                        <a href="purchase-order/pdf/{{ $p->id }}" target="_blank" id="pdf" class="btn btn-sm btn-white m-b-10 p-l-5">
                            <i class="fa fa-file-pdf-o t-plus-1 text-danger fa-fw fa-lg" aria-hidden="true"></i> PDF
                        </a>
                        <a href="purchase-order/{{ $p->id }}"  id="print" class="btn btn-sm btn-white m-b-10 p-l-5">
                            <i class="fa fa-print t-plus-1 text-info fa-fw fa-lg" aria-hidden="true"></i> Print
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- end panel -->
@endsection

@section('js')
<script src="{{ asset('plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/customJS/po-view.js') }}"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
@endsection