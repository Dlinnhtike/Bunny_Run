@extends('layouts.admin_master')
@section('title','Client List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        People
        <small>Client List</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Client List</li>
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
                        <th>Client Name</th>
                        <th>Member Type</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                     
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
          window.location = 'deleteclient/' + id;
          
      });
</script>
@endsection
