@extends('layouts.public_master')
@section('title','Home')
@section('content')
<div class="container-fluid body_frame">
    <div class="row hd_photo_frame">
        <div class="col-12 hd_img_text">
            <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-1 col-sm-9 offset-sm-1">
            <h1>Quick And Easy</h1>
            <p class="bold_text_style">Delivery</p>
            <p class="hd_intro_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <div class="input-group mb-3 find_package">
                <input type="text" class="" placeholder="Type Package ID" style="width:180px; border:1px solid #ccc;outline: none;">
                <span class="input-group-text" type="button" style="border-radius:0;">Track Package</span>
            </div>    
        </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 hd_photo_left">
            <img src="{{asset('img/hd_left_bg.jpg')}}" alt="">
        </div>
        <div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2 hd_photo_right">
            <img src="{{asset('img/hd_right_bg.jpg')}}" alt="" style="">
        </div>
        
        <div class="mobile_hd_photo_frame">
        <img src="{{asset('img/hd_right_bg.jpg')}}" alt="" style="">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content_heading_text">Let's Start Shipping</div>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="inner_box ">
                            data
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="inner_box ">data</div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="inner_box ">data</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection