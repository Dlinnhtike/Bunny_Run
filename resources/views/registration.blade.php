@extends('layouts.public_master')
@section('title','Member Registration')
@section('content')
<div class="container-fluid body_frame">
   <!-- <div class="row page_banner">
        <img src="{{asset('img/banner_img.jpg')}}" alt="">
        <div class="col-10 offset-1 banner_nav">
            <div class="banner_title">Registration</div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="float:right;">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registration</li>
            </ol>
            </nav>
        </div>
   </div> -->
   <div class="container ">
   <div class="row">
           <div class="col-lg-8 offset-lg-2">
            <h1 class="content_heading_text">Member Registration Form</h1>
            @if(Session::has('fail'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                {{Session::get('fail')}}
            </div>
            @endif
           </div>
       </div>
       <div class="row">
           <div class="col-lg-8 offset-lg-2 reg_form_frame">
           <form class="row g-3" action="{{url('/people/registration')}}" method="POST">
               @csrf
           <div class="col-md-6">
                <label for="" class="form-label">Name</label>
                <input type="text" name="user_name" class="form-control" id="" value="{{old('user_name')}}" required>
                <span class="text-danger">@error('user_name') {{$message}} @enderror</span>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="" value="{{old('email')}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id=""  required>
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="con_password" class="form-control" id="" required>
                <span class="text-danger">@error('con_password') {{$message}} @enderror</span>
            </div>
            <div class="col-12">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" id="" name="address" placeholder="1234 Sample Street" value="{{old('address')}}">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" id="" name="phone" required value="{{old('phone')}}">
                <span class="text-danger">@error('phone') {{$message}} @enderror</span>
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">City/Township</label>
                <input type="text" class="form-control" id="" name="township" value="{{old('township')}}">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">State/Region</label>
                <select id="" class="form-select" name="state" required>
                <option value="">Choose...</option>
                    <?php
                        $state = DB::table('states')->get();
                        foreach($state as $value){
                        ?>
                        <option value="{{$value->id}}">{{$value->state_name}}</option>
                        <?php
                        }
                    ?>
                </select>
                <span class="text-danger">@error('state') {{$message}} @enderror</span>
            </div>
            
            <!-- <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                Agree to terms and conditions 
                </label>
                </div>
            </div> -->
            <div class="col-12">
            <div class="form-group" style="padding-top:10px;">
                <button type="submit" class="btn btn-sm btn-primary">Submit <i class="fa fa-paper-plane"></i></button>
                <button type="reset" class="btn btn-sm btn-danger">Cancel <i class="fa fa-window-close"></i></button>
            </div>
            </div>
            </form>
            
           </div>
       </div>
   </div>
</div>

   
@endsection