@extends('layouts.admin_master')
@section('title','Profile')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        System Setup
        <small>User Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{asset('admin/dist/img/avatar.png')}}" alt="User">

        <h3 class="profile-username text-center">Full Name Here</h3>
        <p> &nbsp;</p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Position</b> <a class="pull-right">Manager</a>
          </li>
          <li class="list-group-item">
            <b>User Name</b> <a class="pull-right">{{Session::get('Usersession')['UserName']}}</a>
          </li>
          <li class="list-group-item">
            <b>System</b> <a class="pull-right">
                @php
                  $usertype =Session::get('Usersession')['UserType'];
                @endphp
                @if($usertype==1)
                  Administrator
                @endif
                @if($usertype==2)
                  Manager
                @endif
                @if($usertype==3)
                  Editor
                @endif
            </a>
          </li>
          <li class="list-group-item">
            <b>Created Date</b> <a class="pull-right">
            @php 
              $data= App\Models\SystemUser::find(Session::get('Usersession')['UserId'])
            @endphp
            {{date('d-M-Y', strtotime($data->created_at));}} 
            </a>
          </li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#editprofile" data-toggle="tab">Edit Profile</a></li>
        <li><a href="#changepassword" data-toggle="tab">Change Password</a></li>
      </ul>
      <div class="tab-content">
        
        <!-- /.tab-pane -->
        <div class="active tab-pane" id="editprofile">
          <!-- The timeline -->
          <div style="min-height:68px;">
          @if(Session::has('fail'))
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              {{Session::get('fail')}}
          </div>
          @endif
        </div>
          <form class="form-horizontal">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">User Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="">
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="">
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Full Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="" placeholder="Full Name" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">User Type</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="" readonly>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="changepassword">
        <div style="min-height:68px;">
         
        </div>
          <form class="form-horizontal" action="{{url('change_systemuser_password')}}" method="POST">
          @csrf
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Current Password</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" id="" placeholder="Type Your Password" name="current" required>
                <input type="hidden" value="{{Session::get('Usersession')['UserId']}}" name="id">
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">New Password </label>

              <div class="col-sm-10">
              <input type="password" class="form-control" id="" placeholder="Type New Password" name="newpassword" >
              <span class="text-danger"> @error('newpassword') {{$message}} @enderror</span>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Confirm Password </label>

              <div class="col-sm-10">
              <input type="password" class="form-control" id="" placeholder="Re-enter Password" name="confirmpassword" >
              <span class="text-danger"> @error('confirmpassword') {{$message}} @enderror</span>  
            </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
