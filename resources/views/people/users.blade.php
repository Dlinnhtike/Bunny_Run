@extends('layouts.admin_master')
@section('title','User List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        People
        <small>User List</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User List</li>
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
                    <table class="table table-bordered table-striped data_list" id="example1">
                      <thead>
                        <tr>
                        <th style="width: 50px">#</th>
                        <th>User Name</th>
                        <th>Member Type</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php($count=1)
                        @foreach($users as $user)
                        <tr>
                          <td>{{$count++}}</td>
                          <td>{{$user->user_name}}</td>
                          <td></td>
                          <td>{{$user->phone}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->address}}, {{$user->township}}</td>
                          <td>
                            <?php 
                              $state = DB::table('states')->where('id',$user->state)->first();
                              echo $state->state_name;
                            ?>
                          </td>
                          <td>
                            <?php
                              if($user->status==0){echo "<button class='btn btn-xs btn-success'>Active</button>";}
                              if($user->status==1){echo "<button class='btn btn-xs btn-danger'>Blocked</button>";}
                              //if($user->status==3){echo "Deleted";}
                            ?>
                          </td>
                          <td>
                          <a href="{{url('people/edit_user',$user->id)}}">
                              <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>
                            </a>
                            <a href="#delModal" id="<?=$user->id?>" class="delete_data">
                              <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                            </a>
                            <a href="{{url('people/detail_user',$user->id)}}">
                              <button class="btn btn-xs btn-default" data-toggle="tooltip"title="Deli Status"><i class="fa fa-bars"></i></button>
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
  <div class="modal modal-primary fade" id="delModal">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you wnat to DELETE user!&hellip;</p>
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
          window.location = 'delete_user/' + id;
          
      });
</script>
@endsection
