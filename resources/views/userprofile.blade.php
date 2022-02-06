@extends('layouts.public_master')
@section('title','User Profile')
@section('content')
<?php 
    if(isset(Session::get('pubUsersession')['UserId'])){
        $id =Session::get('pubUsersession')['UserId'];
        $user = DB::table('users')->where('id',$id)->first();
    }
?>
<div class="container-fluid body_frame" style="background:#f1f1f1;">
   <!-- <div class="row page_banner">
        <img src="{{asset('img/banner_img.jpg')}}" alt="">
        <div class="col-10 offset-1 banner_nav">
            <div class="banner_title">{{$user->user_name}}</div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="float:right;">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
            </nav>
        </div>
   </div> -->
   <div class="container ">
       <div class="row profile_row" style="background:#e7e5e5; padding-bottom:20px;">
           <div class="col-lg-3 col-md-4">
               <div class="profile_left_frame">
                <div class="img_frame">
                   <img src="{{asset('img/avatar.png')}}" alt="">
                </div>
                <div class="name_frame">
                {{$user->user_name}}<br>
                    <small>Member</small>
                </div>
                <div class="profile_left_list">
                    <ul>
                        <a href="{{asset('/userprofile')}}">
                        <li>Orders List <span>{{count($orders)}}</span></li>
                        </a>
                        <li><a href="{{asset('/usersetting')}}">Setting</a></li>
                        <li><a href="{{asset('/changepassword')}}">Change Password</a></li>
                    </ul>
                </div>
                <div class="" style="color:#636262;font-size:13px; padding-top:10px; padding-bottom:10px;">
                    Date :: <span style="float:right;">{{date('d F Y h:i A')}}</span>
                </div>
               </div>
           </div>
           <div class="col-lg-9 col-md-8">
               <div class="profile_right_frame">
                   <div class="row">
                       <div class="col-2" style="border-top:3px solid #c20d1b; margin-left:2px;margin-top:-10px;"></div>
                   </div>
                   <div class="row">
                       <div class="col-12">
                           <span class="title">Orders List</span>
                           <div class="table-responsive">
                               
                           <table class="table table-striped table-hover" style="font-size:13px;" id="example">
                           <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">To-Name</th>
                                <th>City / Sate</th>
                                <th>Deli Type</th>
                                <th>Amount</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count=1)
                            @foreach($orders as $value)
                                <tr>
                                <th scope="row">{{$count++}}</th>
                                <td>{{date('d-m-Y h:i A', strtotime($value->created_at));}}</td>
                                <td>{{$value->to_name}}</td>
                                <td>
                                    {{$value->to_township}} / {{$value->state_name}}
                                </td>
                                <td>{{$value->deli_type}}</td>
                                <td></td>
                                <td>
                                    <a href="">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="tooltip"title="Cancel"><i class="fa fa-cancel"></i></button>
                                    </a>
                                    <a href="#delModal" id="<?=$value->id?>" class="delete_data">
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip"title="Delete"><i class="fa fa-times"></i></button>
                                    </a>
                                    <a href="">
                                    <button class="btn btn-sm btn-secondary" data-toggle="tooltip"title="Detail"><i class="fa fa-bars"></i></button>
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
   </div>
</div>
@endsection
<!-- <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
        $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();
          $('#example').DataTable({
            aLengthMenu: [
              [30, 50, 100, 200, -1],
              [30, 50, 100, 200, "All"]
            ],
          });
        });
    </script> -->
