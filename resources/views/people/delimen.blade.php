@extends('layouts.admin_master')
@section('title','Delivery Men List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        People
        <!-- <small>Delivery Men List</small> -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_modal">
        <i class="fa fa-plus"></i> &nbsp; Deli Men
        </button>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Delivery Men</li>
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
                    <div class="col-lg-12">
                    @if($errors->any())
                        {!! implode('', $errors->all('<div style="color:red;text-align:center;">:message</div>')) !!}
                    @endif
                    <table class="table table-bordered table-striped data_list" id="example1">
                      <thead>
                        <tr>
                        <th style="width: 50px">#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Zone</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($count=1)
                      @foreach($delimen as $value)
                        <tr>
                          <td>{{$count++}}</td>
                          <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->phone}}</td>
                          <td>{{$value->address}}, {{$value->township}}</td>
                          <td>{{$value->state_name}}</td>
                          <td>{{$value->zone_name}}</td>
                          <td>
                          <a href="{{url('people/edit_delimen',$value->id)}}">
                              <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>
                            </a>
                            <a href="#delModal" id="{{$value->id}}" class="delete_data">
                              <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                            </a>
                            <a href="{{url('order/listby_men',$value->id)}}">
                              <button class="btn btn-xs btn-primary" data-toggle="tooltip"title="Delivery List"><i class="fa fa-bars"></i></button>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
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
  <div class="modal fade" id="add_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create New Delivery Men</h4>
        </div>
        <form method="post" action="{{url('people/create_delimen')}}">
          @csrf
        <div class="modal-body">
        <div class="form-group">
          <label for="">Name <span style="color:red;">*</span></label>
          <input type="text" class="form-control" placeholder="Delivery Man Name" name="name" required>
        </div>
        <div class="form-group">
          <label for="">Password <span style="color:red;">*</span></label>
          <input type="password" class="form-control" id="" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
          <label for="">Confirm Password <span style="color:red;">*</span></label>
          <input type="password" class="form-control" id="" placeholder="Confirm Password" name="confirm_password" required>
        </div>
        <div class="form-group">
          <label for="">Phone <span style="color:red;">*</span></label>
          <input type="text" class="form-control" placeholder="Phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" class="form-control" placeholder="Address" name="address" required>
        </div>
        <div class="form-group">
          <label for="">Township <span style="color:red;">*</span></label>
          <select name="township" id="townshiplist" class="form-control" required>
            <option value="">Select First State</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">State <span style="color:red;">*</span></label>
          <select name="state" id="state" class="form-control" required>
            <option value="">Select State</option>
            @foreach($state as $state_value)
              <option value="{{$state_value->id}}">{{$state_value->state_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Delivery Zone <span style="color:red;">*</span></label>
          <select name="zone" id="" class="form-control" required>
            <option value="">Select State</option>
            @foreach($zone as $zone_value)
              <option value="{{$zone_value->id}}">{{$zone_value->zone_name}}</option>
            @endforeach
          </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="reset" class="btn btn-warning">Reset</button>
          <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal modal-primary fade" id="delModal">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you wnat to DELETE Delivery Men!&hellip;</p>
              </div>
              <div class="modal-footer del_foot">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline delete-confrim">Confirm Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal end -->
  <script>
    var id;
      $('.data_list').on('click', '.delete_data', function(e) {
        
          e.preventDefault();
          id = e.currentTarget.id;
          $('#delModal').modal('show');
          return false;
      });
      $('.del_foot').on('click', '.delete-confrim', function(e){
          window.location = 'delete_delimen/' + id;
          
      });
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
