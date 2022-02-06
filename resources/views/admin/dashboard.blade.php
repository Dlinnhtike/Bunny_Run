@extends('layouts.admin_master')
@section('title','Dashboard page')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Quick Access View</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <section class="content">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php 
                $new_order = DB::table('deli_order')->where('status',1)->get();
                $month = DB::table('deli_order')->where('created_at', 'like', date('Y-m').'%')->get();
              ?>
              <h3>{{count($new_order)}}</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">{{date('F')}} &nbsp; <i class="fa fa-arrow-circle-right"></i> &nbsp; {{count($month)}}</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>

              <p>Total Client</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">{{date('F')}} &nbsp; <i class="fa fa-arrow-circle-right"></i>&nbsp;  0</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php 
                $total_member = DB::table('users')->get();
                $usermonth = DB::table('users')->where('created_at', 'like', date('Y-m').'%')->get();
              ?>
              <h3>{{count($total_member)}}</h3>

              <p>Total Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people-outline"></i>
            </div>
            <a href="#" class="small-box-footer">{{date('F')}} &nbsp; <i class="fa fa-arrow-circle-right"></i> &nbsp; {{count($usermonth)}}</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>10</h3>

              <p>Delivery Men</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">{{date('F')}} &nbsp; <i class="fa fa-arrow-circle-right"></i> &nbsp; 0</a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Latest New Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered table-striped data_list" id="">
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
                       <tr>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                       </tr>
                      </tbody>
                    </table>
                </div>
              </div>
              </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-md-7">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Active Delivery List</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered table-striped data_list" id="">
                      <thead>
                        <tr>
                        <th style="">#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>State</th>
                        <th>Zone</th>
                        <th>Type</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                      </tbody>
                    </table>
                </div>
              </div>
              </div>
        </div>
      </div>
      </div>
      </section>
      
    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

@endsection
