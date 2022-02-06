@extends('layouts.admin_master')
@section('title','Edit Employee')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" data-toggle="tooltip"title="Back"></i></a>
        Office
        <small class="text-black">Edit Employee</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Employee</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body">
                    <div class="row">
                    <form role="form" action="{{url('update_employee')}}" method="POST">
                            @csrf
                    <div class="col-lg-6">  
                    <!-- {{ Request::segment(1) }} -->
                        
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
                            <label for="">Employee Name</label><span class="text-danger">: @error('emp_name') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="emp_name" placeholder="Name" value="{{$employees->empname}}" required>
                                <input type="hidden" name="id" value="{{$employees->id}}">
                            </div>
                            <div class="form-group">
                            <label for="">Email address</label> <span class="text-danger">: @error('email') {{$message}} @enderror</span>
                            <input type="email" class="form-control" id="" name="email" placeholder="Enter email" value="{{$employees->email}}">
                            </div>
                            <div class="form-group">
                            <label for="">Phone</label> <span class="text-danger">: @error('phone') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="phone" placeholder="Phone Number" value="{{$employees->phone}}" required>
                            </div>
                            <div class="form-group">
                            <label for="">Address</label> <span class="text-danger">: @error('address') {{$message}} @enderror</span>
                            <input type="text" class="form-control" id="" name="address" placeholder="Address" value="{{$employees->address}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Township</label><span class="text-danger">: @error('township') {{$message}} @enderror</span>
                                <select name="township" id="townshiplist" class="form-control" class="townshiplist" required>
                                    <option value="">First Select State</option>
                                    <option value="{{$employees->township}}" selected>{{$employees->township}}</option>
                                </select>
                                <div id="" class="form-text"></div>
                            </div> 
                            <div class="form-group">
                                <label for="">State</label><span class="text-danger">@error('state') {{$message}} @enderror</span>
                                <select name="state" id="state" class="form-control" required>
                                    <option value="">Select State</option>
                                    @foreach($state as $state)
                                        <option value="{{$state->id}}" {{($employees->state_id==$state->id) ? 'selected' :'' }}>{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                    
                    </div>
                    <div class="col-lg-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Join Date</label><span class="text-danger">: @error('emp_name') {{$message}} @enderror</span>
                                <input type="date" class="form-control" id="" name="join_date" value="{{$employees->join_date}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Position</label><span class="text-danger">: @error('position') {{$message}} @enderror</span>
                                <select name="position" id="" class="form-control" required>
                                    <option value=""> Select Postion</option>
                                    @foreach($position as $pos)
                                        <option value="{{$pos->position_name}}" {{ ($employees->position==$pos->position_name)? 'selected':''}}>{{$pos->position_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Department</label><span class="text-danger">: @error('department') {{$message}} @enderror</span>
                                <select name="department" id="" class="form-control" required>
                                    <option value=""> Select Department</option>
                                    @foreach($department as $dept)
                                        <option value="{{$dept->dept_name}}" {{($employees->department==$dept->dept_name) ? 'selected' : '' }}>{{$dept->dept_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Branch</label><span class="text-danger">: @error('branch') {{$message}} @enderror</span>
                                <select name="branch" id="" class="form-control" required>
                                    <option value="" >Select Branch</option>
                                    @foreach($branch as $bh)
                                        <option value="{{$bh->id}}" {{($employees->branch_id == $bh->id) ? 'selected' : ''}}>{{$bh->branch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Remark</label><span class="text-danger">: @error('remark') {{$message}} @enderror</span>
                                <textarea name="remark" class="form-control" placeholder="Type Remark for your Employee">{{$employees->remark}}</textarea>
                            </div>
                            <divclass="form-group">
                                <button type="submit" class="btn btn-primary">Create <i class="fa fa-check"></i></button>
                                <button type="reset" class="btn btn-warning">Cancel <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
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
    $("#state").change(function(){
      var id = $(this).val();
      var div=$(this).parent();
      var op=" ";
            $.ajax
            ({
                type: "get",
                url: "/office/gettownship",
                //url:'{!!URL::to('gettownship')!!}',
                dataType: 'json',
                data: {'id':id},
                success: function (data) {
                    op+='<option value="0" selected disabled>Select Township</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].township_name+'">'+data[i].township_name+'</option>';
                            }
                        document.getElementById('townshiplist').innerHTML=op;
                }
            })
        });
});
</script>