@extends('layouts.admin_master')
@section('title','System User List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        System Setup
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
                       <table class="table table-bordered table-striped data_list">
                        <tr>
                        <th style="width: 50px">#</th>
                        <th>User Name</th>
                        <th>EMP Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Action</th>
                        </tr>
                        @php($count=1)
                        @foreach($users as $user)
                      
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$user->username}}</td>
                            <td>
                              
                              <?php
                              if($user->empID!=1){
                                  $data = DB::table('employees')->where('id', $user->empID)->first();
                                  echo $data->empname;
                              }
                              if($user->empID==1){echo "Main Administrator";}
                              ?>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>
                            @if($user->usertypeID ==1)
                                    Owner
                                @endif
                                @if($user->usertypeID  ==2)
                                    Administrator
                                @endif
                                @if($user->usertypeID  ==3)
                                    Manager
                                @endif
                                @if($user->usertypeID  ==4)
                                    Editor
                                @endif
                            </td>
                            <td class="text-right" style="width:100px;">
                            <a href="{{url('system/editsystem_user',$user->id)}}">
                              <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>
                            </a>
                            <a href="#delModal" id="<?=$user->id?>" class="delete_data">
                              <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                            </a>
                            <a href="{{url('system/infosystem_user',$user->id)}}">
                              <button class="btn btn-xs btn-default" data-toggle="tooltip"title="Detail"><i class="fa fa-bars"></i></button>
                            </a>
                            </td>
                        </tr>
                       
                        @endforeach
              </table>
              <div class="text-right">
              {{$users->links()}}
              </div>
              
              <div class="ajaxlist">

              </div>
                  
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
  <!-- /.modal start -->
  
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
    $(document).ready(function(){
      $.get( "/getlistajax", function( data ) {
        $( ".ajaxlist" ).html( data );
        //alert( "Load was performed." );
      });
      //getlist();
      //function getlist(){
        // $.ajax({
        //   type: "GET",
        //   url: "/getlistajax",
        //   dataType: "json",
        //   success: function(data){
        //     $('.ajaxlist').append(data);
            //console.log(response.ajaxlist);
            // $.each(response.ajaxlist,function(key,item){
            // //var count = key+1;
            //   $('.ajaxlist').append(
            //     '<tr>\
            //         <td></td>\
            //         <td>'+item.name+'</td>\
            //         <td>'+item.email+'</td>\
            //         <td>\
            //         </td>\
            //         <td class="text-right" style="width:100px;">\
            //           <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>\
            //           <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>\
            //           <button class="btn btn-xs btn-default" data-toggle="tooltip"title="Detail"><i class="fa fa-bars"></i></button>\
            //         </td>\
            //     </tr>'
            //   );
            // });
         // }
       // });
      //}
    });
    var id;
      $('.data_list').on('click', '.delete_data', function(e) {
        
          e.preventDefault();
          id = e.currentTarget.id;
          $('#delModal').modal('show');
          return false;
      });
      $('.del_foot').on('click', '.delete-confrim', function(e){
          window.location = 'deletesystem_user/' + id;
          
      });
  </script>
@endsection