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
                    <div class="col-md-4">
                        <div class="inner_box ">
                            <a href="{{url('/create_account')}}">
                            <div class="inner_icon">
                                <img src="{{asset('img/icon_1.jpg')}}" alt="">
                            </div>
                            <div class="title"> Create Account</div>
                            <div class="desc">
                            Get started in less than 3 minutes
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inner_box ">
                            <div class="inner_icon">
                                <img src="{{asset('img/icon_2.jpg')}}" alt="">
                            </div>
                            <div class="title"> Send parcels</div>
                            <div class="desc">
                            Fill Delivery Info and upload photo
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="inner_box ">
                            <div class="inner_icon">
                                <img src="{{asset('img/icon_3.jpg')}}" alt="">
                            </div>
                            <div class="title"> Delivery</div>
                            <div class="desc">
                            Confirmation, Collection and Delivery
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="cointer-fluid body_quick_start_frame">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="row">
                    <div class="col-lg-4 col-md-4 big_hd_text">Quick Start Now!</div>
                    <div class="col-lg-4 col-md-4" style="text-align:center;">
                        <button type="button" class="btn quick_start_button" style="border-radius:0;"><i class="fas fa-paper-plane"></i> &nbsp; START</button>
                    </div>
                    <div class="col-lg-4 col-md-4 right_bar_img">
                        <img src="{{asset('img/right_bar.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cointer-fluid services_frame">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="row">
                    <div class="col-12">
                        <div class="content_heading_text">
                            Services<br>
                            <img src="{{asset('img/banny_icon_with_line.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 services_col">
                        <div class="services_inner_icon">
                            <img src="{{asset('img/icon_4.jpg')}}" alt="">
                        </div>
                        <div class="desc">
                            Pickups Parcel
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 services_col">
                        <div class="services_inner_icon">
                            <img src="{{asset('img/icon_5.jpg')}}" alt="">
                        </div>
                        <div class="desc">
                        Cash-on-delivery
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 services_col">
                        <div class="services_inner_icon">
                            <img src="{{asset('img/icon_6.jpg')}}" alt="">
                        </div>
                        <div class="desc">
                        Money Back Warranty
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection