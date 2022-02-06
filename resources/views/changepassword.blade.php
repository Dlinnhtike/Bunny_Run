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
                           <span class="title">Change Password</span>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12" style="min-height:310px;">
                       <img src="{{asset('img/uc.gif')}}" alt="">
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

   
@endsection