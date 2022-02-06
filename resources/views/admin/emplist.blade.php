@extends('layouts.admin_master')
@section('title','Employee List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <a href="{{url()->previous();}}"><i class="fa fa-arrow-circle-left" alt="Back" data-toggle="tooltip"title="Back"></i></a>
        Office
        <small>Employee List</small>
      </h1>
     
      <ol class="breadcrumb">
       
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Employee List</li>
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
                      <!-- <div class="col-lg-3 col-lg-offset-9" style="padding-right:0; padding-bottom:10px;">
                        <input type="text" name="search" class="form-control search" placeholder="Search:: keyword">
                      </div> -->
                      <div class="ajaxlist" id="ajaxlist">
          
                       <table class="table table-bordered table-striped data_list" id="example1">
                        <thead>
                          <tr>
                          <th style="width: 50px">#</th>
                          <th>Name</th>
                          <th>Positon</th>
                          <th>Department</th>
                          <th>Phone</th>
                          <th>Branch</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php($count=1)
                          @foreach($employees as $emp)
                          <tr>
                            <td>{{$count++}}</td>
                            <td>{{$emp->empname}}</td>
                            <td>{{$emp->position}}</td>
                            <td>{{$emp->department}}</td>
                            <td>{{$emp->phone}}</td>
                            <td>
                            <?php
                                  $data = DB::table('branchs')->where('id', $emp->branch_id)->first();
                                  echo $data->branch_name;
                              ?>
                            </td>
                            <td style="width:100px;">
                            <a href="{{url('office/emp_edit',$emp->id)}}">
                              <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip"title="Edit"><i class="fa fa-edit"></i></button>
                            </a>
                            <a href="#delModal" id="{{$emp->id}}" class="delete">
                              <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                            </a>
                            <a href="{{url('office/emp_detail',$emp->id)}}">
                              <button class="btn btn-xs btn-default" data-toggle="tooltip"title="Detail"><i class="fa fa-bars"></i></button>
                            </a>
                            </td>
                          </tr>
                          @endforeach
						  
                        </tbody>  
              </table>
            </div>
              <div class="text-right">
              {{$employees->links()}}
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
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){

  // var list ="";
  // $.ajax({ url: "/ajax_emplist",
  //       context: document.body,
  //       success: function(data){
  //          for(var i=0;i<data.length;i++){
  //             list+='<span>'+data[i].empname+'</span><br>';
  //              }
  //             $( ".ajaxlist" ).html( list );
  //       }
  //   });
/*
  $('.search').on('keypress', function (e) {
          if(e.which === 13){
            var search_value = $(this).val();
            op="";
            
            $.ajax({
                type: "get",
                url: "/ajax_emplist",
                //url:'{!!URL::to('gettownship')!!}',
                dataType: 'json',
                data: {'search_value':search_value},
                  success: function (data) {
                  op+='<table class="table table-bordered table-striped data_list">\
                        <thead>\
                          <tr>\
                          <th style="width: 50px">#</th>\
                          <th>Name</th>\
                          <th>Positon</th>\
                          <th>Department</th>\
                          <th>Phone</th>\
                          <th>Email</th>\
                          <th>Address</th>\
                          <th>Action</th>\
                          </tr>\
                        </thead>\
                        <tbody>';
                            for(var i=0;i<data.length;i++){
                                op+='<tr>'
                                op+='<td>'+(i+1)+'</td>';
                                op+='<td>'+data[i].empname+'</td>';
                                op+='<td>'+data[i].position+'</td>';
                                op+='<td>'+data[i].department+'</td>';
                                op+='<td>'+data[i].phone+'</td>';
                                op+='<td>'+data[i].email+'</td>';
                                op+='<td>'+data[i].address+', '+data[i].township+'</td>';
                                op+='<td>';
                                op+='<a href="#delModal" id="" class="delete">\
                              <button class="btn btn-xs btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>\
                                    </a>';
                                op+='</td>';
                                op+='</tr>';
                            }
                            op+='</tbody>';
                    op+='</table>';
                  //document.getElementById('ajaxlist').innerHTML=op;
                  $( ".ajaxlist" ).html( op );
                }
            });
            if(search_value==""){
              window.location = '/office/emplist';
            }
         }
   });
   */
   var id;
      $('.data_list').on('click', '.delete', function(e) {
        
        e.preventDefault();
        id = e.currentTarget.id;
        //alert(id);
        $('#delModal').modal('show');
        return false;
      });
      
      $('#del_foot').on('click', '.delete_confrim', function(e){
          window.location = 'delete_emp/' + id;
          //alert(id);
      });
  });
</script>
@endsection