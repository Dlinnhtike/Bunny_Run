@extends('layouts.admin_master')
@section('title','Edit User')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" data-toggle="tooltip"title="Back"></i></a>
        People
        <small class="text-black">Edit User </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit User</li>
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
                        <form role="form" action="{{url('people/update_user')}}" method="POST">
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
                            <input type="text" class="form-control" id="" name="username" placeholder="User Name" value="{{$user->user_name}}">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            </div>
                            <div class="form-group">
                            <label for="">Email address</label> <span class="text-danger">: @error('email') {{$message}} @enderror</span>
                            <input type="email" class="form-control" id="" name="email" placeholder="Enter email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                            <label for="">Password</label> <span class="text-danger">: @error('password') {{$message}} @enderror</span>
                            <input type="password" class="form-control" id="" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                            <label for="">Address</label><span class="text-danger">: @error('address') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="address" placeholder="address" value="{{$user->address}}">
                            </div>
                            <div class="form-group">
                            <label for="">Phone</label><span class="text-danger">: @error('phone') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="phone" placeholder="" value="{{$user->phone}}">
                            </div>
                            <div class="form-group">
                            <label for="">Township</label><span class="text-danger">: @error('township') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="township" placeholder="" value="{{$user->township}}" disabled>
                            </div>
                            @php
                                $state = DB::table('states')->where('id',$user->state)->first();
                            @endphp
                            <div class="form-group">
                            <label for="">State</label><span class="text-danger">: @error('state') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="" placeholder="" value="{{$state->state_name;}}" disabled>
                            <input type="hidden" name="state" value="{{$user->state}}">
                            </div>
                            <div class="form-group">
                            <label for="">User Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="0" {{($user->status==0)?"selected":""}}> Active</option>
                                    <option value="1" {{($user->status==1)?"selected":""}}>Block </option>
                                    <option value="2" {{($user->status==2)?"selected":""}}>Alert</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check"></i> Update</button>
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