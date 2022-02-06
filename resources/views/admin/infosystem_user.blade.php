@extends('layouts.admin_master')
@section('title','Detail System User')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" data-toggle="tooltip"title="Back"></i></a>
        System Setup
        <small class="text-black">Detail User Info</small>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Detail User</li>
        
      </ol>
      
    </section>

    <!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
                    <div class="row">
                    <div class="col-lg-6">  
                        <h3>User Deatail Information</h3>
                    <!-- {{ Request::segment(1) }} -->
                        <table class="table table-striped table-hover table-success" style="min-height:280px;">
                            <tr>
                                <th>User Name </th>
                                <th>:</th>
                                <td>{{$userdata->username}}</td>
                            </tr>
                            <tr>
                                <th>Full Name</th>
                                <th>:</th>
                                <td>
                                <?php
                              if($userdata->empID!=1){
                                  $data = DB::table('employees')->where('id', $userdata->empID)->first();
                                  echo $data->empname;
                              }
                              if($userdata->empID==1){echo "Main Administrator";}
                              ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <td>{{$userdata->email}}</td>
                            </tr>
                            <tr>
                                <th>User Type</th>
                                <th>:</th>
                                <td>
                                @if($userdata->usertypeID ==1)
                                    Owner
                                @endif
                                @if($userdata->usertypeID  ==2)
                                    Administrator
                                @endif
                                @if($userdata->usertypeID  ==3)
                                    Manager
                                @endif
                                @if($userdata->usertypeID  ==4)
                                    Editor
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created Date</th>
                                <th>:</th>
                                <td>{{date('d F Y - H:i',strtotime($userdata->created_at))}}</td>
                            </tr>
                            
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