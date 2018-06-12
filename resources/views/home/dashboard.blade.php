@extends('shared.layout')

@section('title')
  Dashboard
@endsection

@section('content')
<!-- begin row -->
<div class="row">
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
                <h4>TOTAL VISITORS</h4>
                <p>3,291,922</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fa fa-link"></i></div>
            <div class="stats-info">
                <h4>BOUNCE RATE</h4>
                <p>20.44%</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-grey-darker">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>UNIQUE VISITORS</h4>
                <p>1,291,922</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-black-lighter">
            <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
            <div class="stats-info">
                <h4>AVG TIME ON SITE</h4>
                <p>00:12:23</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
</div>
<!-- end row -->


<!-- begin row -->
<div class="row">
    <!-- begin col-8 -->
    <div class="col-lg-8">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm"></div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-8 -->
    
    <!-- begin col-4 -->
    <div class="col-lg-4">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="index-6">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Analytics Details</h4>
            </div>
            <div class="panel-body p-t-0">
                <div class="table-responsive">
                    <table class="table table-valign-middle">
                        <thead>
                            <tr>	
                                <th>Source</th>
                                <th>Total</th>
                                <th>Trend</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="label label-danger">Unique Visitor</label></td>
                                <td>13,203 <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
                                <td><div id="sparkline-unique-visitor"></div></td>
                            </tr>
                            <tr>
                                <td><label class="label label-warning">Bounce Rate</label></td>
                                <td>28.2%</td>
                                <td><div id="sparkline-bounce-rate"></div></td>
                            </tr>
                            <tr>
                                <td><label class="label label-success">Total Page Views</label></td>
                                <td>1,230,030</td>
                                <td><div id="sparkline-total-page-views"></div></td>
                            </tr>
                            <tr>
                                <td><label class="label label-primary">Avg Time On Site</label></td>
                                <td>00:03:45</td>
                                <td><div id="sparkline-avg-time-on-site"></div></td>
                            </tr>
                            <tr>
                                <td><label class="label label-default">% New Visits</label></td>
                                <td>40.5%</td>
                                <td><div id="sparkline-new-visits"></div></td>
                            </tr>
                            <tr>
                                <td><label class="label label-inverse">Return Visitors</label></td>
                                <td>73.4%</td>
                                <td><div id="sparkline-return-visitors"></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-4 -->
</div>
<!-- end row -->
@endsection