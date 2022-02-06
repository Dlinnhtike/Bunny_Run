@extends('layouts.admin_master')
@section('title','Detail User Info')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" data-toggle="tooltip"title="Back"></i></a>
        People
        <small class="text-black">Detail Information </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
                    <div class="row">
                    <div class="col-lg-12">
                    <table class="table table-bordered table-striped data_list" id="example1">
                      <thead>
                        <tr>
                        <th style="">#</th>
                        <th>Date</th>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Township/City</th>
                        <th>State</th>
                        <th>Type</th>
                        <th>Pay Status</th>
                        <th>Insur</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($count=1)
                        @foreach($orderlist as $value)
                        <?php 
                        if($value->id < 10)
                        {
                            $order_code = "OID-000".$value->id;
                        }
                        if($value->id < 100 && $value->id >=10)
                        {
                            $order_code = "OID-00".$value->id;
                        }
                        if($value->id >= 100 && $value->id < 1000)
                        {
                            $order_code = "OID-0".$value->id;
                        }
                        if($value->id >= 1000)
                        {
                            $order_code = "OID-".$value->id;
                        }
                        ?>
                        <tr>
                          <td>{{$count++}}</td>
                          <td>{{date('d-m-Y h:i A', strtotime($value->created_at));}}</td>
                          <td>{{$order_code}}</td>
                          <td>{{$value->from_name}}</td>
                          <td>{{$value->from_phone}}</td>
                          <td>{{$value->from_township}} </td>
                          <td>{{$value->state_name}}</td>
                          <td>{{$value->deli_type}}</td>
                          <td>{{$value->pay_status}}</td>
                          <td>{{$value->insurance}}</td>
                          <td>
                            <!-- order Status 1=request 2=confirm/process 3=Finished 0=cancel -->
                            <?php 
                              if($value->status==1){ echo "<span style='color:red;'>Request</span>";}
                            ?>
                          </td>
                          <td>
                              <a href="">
                              <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Cancel"><i class="fa fa-ban"></i></button>
                              </a>
                              <a href="#delModal" id="<?=$value->id?>" class="delete_data">
                              <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                              </a>
                              <a href="{{url('order/detail',$value->id)}}">
                              <button class="btn btn-xs btn-secondary" data-toggle="tooltip"title="Order Detail"><i class="fa fa-bars"></i></button>
                              </a>
                              <a href="">
                              <button class="btn btn-xs btn-success" data-toggle="tooltip"title="Confirm & Process"><i class="fa fa-check"></i></button>
                              </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      </table>
                    </div>
                    <div>
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
