@extends('layouts.admin_master')
@section('title','Order Detail')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        Order
        <small>Order Detail</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Order Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
                    <div class="row">
                   
                    <div class="col-lg-6 col-md-6">
                        <h4>Sender Information</h4>
                        <table class="table table-hover" style="background:#ddd;">
                            <tr>
                                <th>Name </th><th>:</th><td>{{$detail->from_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone </th><th>:</th><td>{{$detail->from_phone}}</td>
                            </tr>
                            <tr>
                                <th>Address </th><th>:</th><td>{{$detail->from_address}}</td>
                            </tr>
                            <tr>
                                <th>Township </th><th>:</th><td>{{$detail->from_township}}</td>
                            </tr>
                            <tr>
                                <th>State </th><th>:</th><td>
                                    <?php 
                                        $state = DB::table('states')->where('id',$detail->from_state)->first();
                                        echo $state->state_name;
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6 col-md-6">
                    <h4>Receiver Information</h4>
                        <table class="table table-hover" style="background:#ddd;">
                            <tr>
                                <th>Name </th><th>:</th><td>{{$detail->from_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone </th><th>:</th><td>{{$detail->from_phone}}</td>
                            </tr>
                            <tr>
                                <th>Address </th><th>:</th><td>{{$detail->from_address}}</td>
                            </tr>
                            <tr>
                                <th>Township </th><th>:</th><td>{{$detail->from_township}}</td>
                            </tr>
                            <tr>
                                <th>State </th><th>:</th><td>
                                    <?php 
                                        $state = DB::table('states')->where('id',$detail->from_state)->first();
                                        echo $state->state_name;
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <h4 class="text-info">Delivery Information</h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width:25%;">About Of Parcel</th> <th style="width:10px;">:</th>
                                <td>{{$detail->about_parcel}}</td>
                            </tr>
                            <tr>
                                <th>Width / Height / Length (inches)</th> <th>:</th>
                                <td>{{$detail->width}} / {{$detail->height}} / {{$detail->length}}</td>
                            </tr>
                            <tr>
                                <th>Number Of Parcel</th> <th>:</th>
                                <td>{{$detail->no_of_parcel}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Type</th> <th>:</th>
                                <td>{{$detail->deli_type}}</td>
                            </tr>
                            <tr>
                                <th>Delivery Fee</th> <th>:</th>
                                <td>{{$detail->pay_status}}</td>
                            </tr>
                            <tr>
                                <th>Insurance</th> <th>:</th>
                                <td>{{$detail->insurance}}</td>
                            </tr>
                            <tr>
                                <th>Available Pickup Date</th> <th>:</th>
                                <td class="text-bold">{{$detail->a_pk_date}}</td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@endsection
