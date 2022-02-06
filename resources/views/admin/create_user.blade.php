@extends('layouts.admin_master')
@section('title','Create System User')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" data-toggle="tooltip"title="Back"></i></a>
        System Setup
        <small class="text-black">User Registration</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Create User</li>
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
                    <!-- {{ Request::segment(1) }} -->
                        <form role="form" action="{{url('add_system_user')}}" method="POST">
                            @csrf
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
                        <div class="box-body">
                            <div class="form-group">
                            <label for="">User Name</label><span class="text-danger">: @error('username') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="username" placeholder="User Name" value="{{old('username')}}">
                            </div>
                            <div class="form-group">
                            <label for="">Email address</label> <span class="text-danger">: @error('email') {{$message}} @enderror</span>
                            <input type="email" class="form-control" id="" name="email" placeholder="Enter email" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                            <label for="">Password</label> <span class="text-danger">: @error('password') {{$message}} @enderror</span>
                            <input type="password" class="form-control" id="" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                            <label for="">Confirm Password</label> <span class="text-danger">: @error('confirm_password') {{$message}} @enderror</span>
                            <input type="password" class="form-control" id="" name="confirm_password" placeholder="Re-enter Password">
                            </div>
                            <div class="form-group">
                            <label for="">Employee Name </label><span class="text-danger">: @error('empID') {{$message}} @enderror</span>
                            <select name="empID" id="emplist" class="form-control">
                                <option value="">Select First Branch</option>
                                
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="">Branch </label><span class="text-danger">: @error('branch') {{$message}} @enderror</span>
                            <select name="branch" id="branch" class="form-control" required>
                                <option value="">Select Branch</option>
                                @foreach($branch as $bh)
                                    <option value="{{$bh->id}}">{{$bh->branch_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="">User Type (Rank) </label><span class="text-danger">: @error('usertypeID') {{$message}} @enderror</span>
                            <select name="usertypeID" id="" class="form-control">
                                <option value="">Select User Type</option>
                                <!-- <option value="1" {{ old('usertypeID') == '1' ? 'selected' : '' }}>Owner</option> -->
                                <option value="2" {{ old('usertypeID') == '2' ? 'selected' : '' }}>Administrator</option>
                                <option value="3" {{ old('usertypeID') == '3' ? 'selected' : '' }}>Manager</option>
                                <option value="4" {{ old('usertypeID') == '4' ? 'selected' : '' }}>Editor</option>
                            </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check"></i> Submit</button>
                            <button type="reset" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</button>
                        </div>
                    </form>
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
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
    $("#branch").change(function(){
      var id = $(this).val();
      var div=$(this).parent();
      var op=" ";
            $.ajax
            ({
                type: "get",
                url: "/system/getemplist",
                //url:'{!!URL::to('gettownship')!!}',
                dataType: 'json',
                data: {'id':id},
                success: function (data) {
                    
                    op+='<option value="0" selected disabled>Select Employee</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].id+'">'+data[i].empname+' &nbsp; ['+data[i].position+']</option>';
                            }
                        document.getElementById('emplist').innerHTML=op;
                }
            })
        });
});
</script>