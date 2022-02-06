@extends('layouts.admin_master')
@section('title','Zone')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        System Setup
        <small>Zone</small>
      </h1>
     
      <ol class="breadcrumb">
       
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Zone</li>
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
                    @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                
                                {{Session::get('fail')}}
                            </div>
                            @endif 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                    <h4>Zone List</h4>
                    <table class="table table-bordered table-striped data_list" id="example1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Zone Name</th>
                            <th>State</th>
                            <th>Township</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                         <tbody>
                         @php($count=1)
                         @foreach($zones as $zone)
                              <tr>
                                <td>{{$count++}}</td>
                                <td>{{$zone->zone_name}}</td>
                                <td>
                                  <?php
                                      $data = DB::table('states')->where('id', $zone->state_id)->first();
                                      echo $data->state_name;
                                  ?>
                                </td>
                                <td>
                                  <ul style="padding-left:7px; margin-left:0;">
                                    <?php
                                      $zone_detail = DB::table('zone_detail')->where('zone_id', $zone->id)->get();
                                      foreach($zone_detail as $town){
                                    ?>
                                    <li style="margin-bottom:2px; padding:5px; background:#eee;">
                                      {{$town->township_name}}
                                      <button class="btn btn-xs btn-warning" style="float:right;" data-toggle="tooltip"title="Del Township"><i class="fa fa-times"></i></button>
                                   </li>
                                    <?php } ?>
                                  </ul>
                                </td>
                                <td style="width:50px;">
                                <button class="btn btn-sm btn-danger" style="float:right;" data-toggle="tooltip"title="Del Zone"><i class="fa fa-trash"></i></button>
                              </td>
                              </tr>
                         @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <h4>Create New Zone</h4>
                        <form role="form" action="{{url('system/create_zone')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Zone Name</label>
                                <input type="text" class="form-control" name="zone_name" placeholder="Enter Zone Name" required>
                                <span class="text-danger">@error('zone_name') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">State</label>
                                <select name="state" id="state" class="form-control" required>
                                    <option value="">Select State</option>
                                    @foreach($state as $state)
                                        <option value="{{$state->id}}">{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('state') {{$message}} @enderror</span>
                            </div>
                            <div id="townshiplist" class="form-group">
                            <h4>Choose Township</h4>
                            </div>
                            <span class="text-danger">@error('towhship') {{$message}} @enderror</span>
                            <divclass="form-group">
                                <button type="submit" class="btn btn-success">Create <i class="fa fa-check"></i></button>
                                <button type="reset" class="btn btn-warning">Cancel <i class="fa fa-times"></i></button>
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
  
        <div class="modal modal-danger fade" id="delModal">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you wnat to DELETE Branch!&hellip;</p>
              </div>
              <div class="modal-footer del_foot" id="del_foot">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline delete_confrim">Confirm Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal end -->
@endsection
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var id;
      $('.data_list').on('click', '.delete', function(e) {
        
        e.preventDefault();
        id = e.currentTarget.id;
        //alert(id);
        $('#delModal').modal('show');
        return false;
      });
      
      $('#del_foot').on('click', '.delete_confrim', function(e){
          window.location = 'delete_branch/' + id;
          //alert(id);
      });
      //get township code
      $("#state").change(function(){
      var id = $(this).val();
      var div=$(this).parent();
      var op=" ";
            $.ajax
            ({
                type: "get",
                url: "/system/gettownship",
                //url:'{!!URL::to('gettownship')!!}',
                dataType: 'json',
                data: {'id':id},
                success: function (data) {
                    op+='<h4>Choose Township</h4>';
                            for(var i=0;i<data.length;i++){
                            op+='<input type="checkbox" value="'+data[i].township_name+'" name="township[]" style="margin-left:10px;"> '+data[i].township_name+ '<br>';
                            }
                        document.getElementById('townshiplist').innerHTML=op;
                }
            })
        });
    });
  </script>