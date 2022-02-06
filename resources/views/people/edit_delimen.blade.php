@extends('layouts.admin_master')
@section('title','Edit Delivery Men')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        People
        <small>Edit Delivery Men</small>
        
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Delivery Men</li>
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
                
                <form action="{{url('poeple/update_men')}}" method="post">
                            @csrf
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Delivery Man Name" name="name" required value="{{$men->name}}">
                            <input type="hidden" name="id" value="{{$men->id}}">    
                        </div>
                            <div class="form-group">
                            <label for="">Password </label>
                            <input type="password" class="form-control" id="" placeholder="Password" name="password" >
                            </div>
                            
                            <div class="form-group">
                            <label for="">Phone <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Phone" name="phone" required value="{{$men->phone}}">
                            </div>
                            <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="address" required value="{{$men->address}}">
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                            
                            <div class="form-group">
                            <label for="">Township <span style="color:red;">*</span></label>
                            <select name="township" id="townshiplist" class="form-control" required>
                                <option value="">Select First State</option>
                                <option value="{{$men->township}}" selected>{{$men->township}}</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="">State <span style="color:red;">*</span></label>
                            <select name="state" id="state" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach($state as $state_value)
                                <option value="{{$state_value->id}}" {{($state_value->id==$men->state_id)? 'selected':''}}>{{$state_value->state_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="">Delivery Zone <span style="color:red;">*</span></label>
                            <select name="zone" id="" class="form-control" required>
                                <option value="">Select State</option>
                                
                                @foreach($zone as $zone_value)
                                <option value="{{$zone_value->id}}" {{($zone_value->id==$men->zone_id)? 'selected':''}}>{{$zone_value->zone_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <a href="{{url()->previous();}}">
                            <button type="button" class="btn btn-warning">Cancel <i class="fa fa-times"></i></button>
                            </a>
                            <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <script>
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
                    op+='<option value="" selected disabled>Select Township</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].township_name+'">'+data[i].township_name+'</option>';
                            }
                        document.getElementById('townshiplist').innerHTML=op;
                }
            })
        });
</script>
@endsection
