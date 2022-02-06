@extends('layouts.admin_master')
@section('title','Branch')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        Office
        <small>Branch</small>
      </h1>
     
      <ol class="breadcrumb">
       
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Office</li>
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
                    <div class="col-lg-12">
                       <h4>Branch 
                       <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> New
                      </button>
                        </h4>
                     
                      <table class="table table-bordered table-striped data_list" id="">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Branch Name</th>
                            <th>Address</th>
                            <th>Township/City</th>
                            <th>State</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                         <tbody>
                            @php($count=1)
                            @foreach($branch as $name)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$name->branch_name}}</td>
                                    <td>{{$name->address}}</td>
                                    <td>{{$name->township}}</td>
                                    <td>
                                      <?php 
                                        $state_id = DB::table('states')->where('id',$name->state_id)->first();
                                        echo $state_id->state_name;
                                      ?>
                                    </td>
                                    <td>
                                    <a href="#" data-toggle="modal" data-target="#modal-edti_{{$name->id}}">
                                        <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="#delModal" id="{{$name->id}}" class="delete">
                                        <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                                    </a>
      <div class="modal fade" id="modal-edti_{{$name->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New Branch</h4>
              </div>
              <div class="modal-body">
              <form role="form" action="{{url('office/update_branch')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="">Branch Name</label>
                  <input type="hidden" name="id" value="{{$name->id}}">
                  <input type="text" class="form-control" name="branch_name" value="{{$name->branch_name}}" required>
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" class="form-control" name="address" value="{{$name->address}}" required>
                </div>
                <div class="form-group">
                  <label for="">Township/City</label>
                  <input type="text" class="form-control" name="township" value="{{$name->township}}" required>
                </div>
                <div class="form-group">
                  <label for="">State</label>
                  <select name="state" id="" class="form-control" required>
                      <option value=""> Select State</option>
                      @foreach($state as $value)
                        <option value="{{$value->id}}" {{ ( $value->id == $name->state_id) ? 'selected' : '' }} >{{$value->state_name}}</option>
                      @endforeach
                  </select>
                </div>
              
              </div>
              <!-- /.box-body -->
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
                <button type="reset" class="btn btn-warning">Reset <i class="fa fa-times"></i></button>
              </div>
          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New Branch</h4>
              </div>
              <div class="modal-body">
              <form role="form" action="{{url('office/create_branch')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="">Branch Name</label>
                  <input type="text" class="form-control" name="branch_name" placeholder="Enter Branch Name" required>
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Address" required>
                </div>
                <div class="form-group">
                  <label for="">Township/City</label>
                  <input type="text" class="form-control" name="township" placeholder="Township/City" required>
                </div>
                <div class="form-group">
                  <label for="">State</label>
                  <select name="state" id="" class="form-control" required>
                      <option value=""> Select State</option>
                      @foreach($state as $state)
                        <option value="{{$state->id}}">{{$state->state_name}}</option>
                      @endforeach
                  </select>
                </div>
              
              </div>
              <!-- /.box-body -->
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
                <button type="reset" class="btn btn-warning">Reset <i class="fa fa-times"></i></button>
              </div>
          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
    });
  </script>