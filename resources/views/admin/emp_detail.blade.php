@extends('layouts.admin_master')
@section('title','Employee Detail')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        Office
        <small>Employee Detail</small>
      </h1>
     
      <ol class="breadcrumb">
       
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Employee Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
                    <div class="row">
                    @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Finished!</h4>
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                {{Session::get('fail')}}
                            </div>
                            @endif
                    <div class="col-lg-7">
                      <!-- <div class="col-lg-3 col-lg-offset-9" style="padding-right:0; padding-bottom:10px;">
                        <input type="text" name="search" class="form-control search" placeholder="Search:: keyword">
                      </div> -->
                      <div class="ajaxlist" id="ajaxlist">
                      <h3 class="text-danger">Personal Information</h3>
                       <table class="table table-bordered table-striped data_list">
                          <tr>
                            <th style="">Name</th>
                            <th>:</th>
                            <td>{{$employee->empname}}</td>
                          </tr>
                          <tr>
                            <th style="">Email</th>
                            <th>:</th>
                            <td>{{$employee->email}}</td>
                          </tr>
                          <tr>
                            <th style="">Phone</th>
                            <th>:</th>
                            <td>{{$employee->phone}}</td>
                          </tr>
                          <tr>
                            <th style="">Address</th>
                            <th>:</th>
                            <td>{{$employee->address}}<br> {{$employee->township}}</td>
                          </tr>
                          <tr>
                            <th style="">State/Region</th>
                            <th>:</th>
                            <td>
                            <?php
                                  $data = DB::table('states')->where('id', $employee->state_id)->first();
                                  echo $data->state_name;
                              ?>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div>
                      <h3 class="text-primary">Employee Information</h3>
                       <table class="table table-bordered table-striped data_list">
                          <tr>
                            <th style="">Join Date</th>
                            <th>:</th>
                            <td>{{$employee->join_date}} <span class="text-success" style="float:right;">
                            <?php
                            use Carbon\Carbon;
                            $myDate = $employee->join_date;
                            $result = Carbon::createFromFormat('Y-m-d', $myDate)->diffForHumans();
                            echo $result;
                            ?>
                            </span>
                            </td>
                          </tr>
                          <tr>
                            <th style="">Position</th>
                            <th>:</th>
                            <td>{{$employee->position}}</td>
                          </tr>
                          <tr>
                            <th style="">Department</th>
                            <th>:</th>
                            <td>{{$employee->department}}</td>
                          </tr>
                          <tr>
                            <th style="">Brand </th>
                            <th>:</th>
                            <td>
                            <?php
                                  $branch = DB::table('branchs')->where('id', $employee->branch_id)->first();
                                  echo $branch->branch_name;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th style="">State/Region</th>
                            <th>:</th>
                            <td>
                            <?php
                                  $data = DB::table('states')->where('id', $employee->state_id)->first();
                                  echo $data->state_name;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th style="">Admin Remark</th>
                            <th>:</th>
                            <td>
                            {{$employee->remark}}
                            </td>
                          </tr>
                        </table>
                      </div>
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