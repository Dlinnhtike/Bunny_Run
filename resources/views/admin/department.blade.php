@extends('layouts.admin_master')
@section('title','Department')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        Office
        <small>Department & Position</small>
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
                    <div class="col-lg-6">
                       <h4>Department 
                       <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> Dept
                      </button>
                        </h4>
                     
                      <table class="table table-bordered table-striped dept_data_list">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                         <tbody>
                         @php($count=1)
                         @foreach($department as $dept)
                           <tr>
                             <td>{{$count++}}</td>
                             <td>{{$dept->dept_name}}</td>
                             <td>
                              <a href="#" data-toggle="modal" data-target="#modal-edti_{{$dept->id}}">
                                <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>
                              </a>
                              <a href="#delModal_dept" id="{{$dept->id}}" class="dept_delete">
                                <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                              </a>
        <div class="modal fade" id="modal-edti_{{$dept->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Department</h4>
              </div>
              <div class="modal-body">
              <form role="form" action="{{url('office/update_dept')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="">Department Name</label>
                  <input type="hidden" value="{{$dept->id}}" name="id">
                  <input type="text" class="form-control" name="dept_name" value="{{$dept->dept_name}}" required>
                </div>
              </div>
              <!-- /.box-body -->
            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
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
                    <div class="col-lg-6">
                    <h4>Position
                       <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-pos">
                        <i class="fa fa-plus"></i> Position
                      </button>
                        </h4>
                   
                      <table class="table table-bordered table-striped pos_data_list">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Position Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                         <tbody>
                         @php($count=1)
                         @foreach($position as $pos)
                           <tr>
                             <td>{{$count++}}</td>
                             <td>{{$pos->position_name}}</td>
                             <td>
                             <a href="#" data-toggle="modal" data-target="#modal-pos_{{$pos->id}}">
                                <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>
                              </a>
                              <a href="#delModal_pos" id="{{$pos->id}}" class="pos_delete">
                                <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                              </a>
    <div class="modal fade" id="modal-pos_{{$pos->id}}">
      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Postion</h4>
              </div>
              <div class="modal-body">
              <form role="form" action="{{url('office/update_pos')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="">Postion Name</label>
                  <input type="hidden" value="{{$pos->id}}" name="id">
                  <input type="text" class="form-control" name="pos_name" value="{{$pos->position_name}}" required>
                </div>
              </div>
              <!-- /.box-body -->
            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
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
                <h4 class="modal-title">Create New Department</h4>
              </div>
              <div class="modal-body">
              <form role="form" action="{{url('office/create_dept')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="">Department Name</label>
                  <input type="text" class="form-control" name="dept_name" placeholder="Enter Dept Name" required>
                </div>
              </div>
              <!-- /.box-body -->
            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
              </div>
          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="modal-pos">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New Position</h4>
              </div>
              <div class="modal-body">
              <form role="form" action="{{url('office/create_pos')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="">Postion Name</label>
                  <input type="text" class="form-control" name="pos_name" placeholder="Enter Position Name" required>
                </div>
              </div>
              <!-- /.box-body -->
            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save <i class="fa fa-check"></i></button>
              </div>
          </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
  <div class="modal modal-danger fade" id="delModal_dept">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you wnat to DELETE Department!&hellip;</p>
              </div>
              <div class="modal-footer dept_del_foot" id="dept_del_foot">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline dept_delete_confrim">Confirm Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal end -->
        <div class="modal modal-danger fade" id="delModal_pos">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you wnat to DELETE Position!&hellip;</p>
              </div>
              <div class="modal-footer pos_del_foot" id="pos_del_foot">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline pos_delete_confrim">Confirm Delete</button>
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
      $('.dept_data_list').on('click', '.dept_delete', function(e) {
        
        e.preventDefault();
        id = e.currentTarget.id;
        //alert(id);
        $('#delModal_dept').modal('show');
        return false;
      });
      
      $('#dept_del_foot').on('click', '.dept_delete_confrim', function(e){
          window.location = 'delete_department/' + id;
          //alert(id);
      });

      $('.pos_data_list').on('click', '.pos_delete', function(e) {
        
        e.preventDefault();
        id = e.currentTarget.id;
        //alert(id);
        $('#delModal_pos').modal('show');
        return false;
      });
      
      $('#pos_del_foot').on('click', '.pos_delete_confrim', function(e){
          window.location = 'delete_position/' + id;
          //alert(id);
      });
    });
  </script>