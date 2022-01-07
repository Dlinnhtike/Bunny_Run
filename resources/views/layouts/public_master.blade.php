<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('img/icon.png')}}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <link href="{{asset('font_awsome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('font_awsome/css/brands.css')}}" rel="stylesheet">
    <link href="{{asset('font_awsome/css/solid.css')}}" rel="stylesheet">
    <!-- Google Fonts -->
     
    <title>Bunny Run | @yield('title')</title>
    <style>
      .sticky{
        position: -webkit-sticky; position: sticky; top: 10px;
        //border:1px solid #f0f0f0;
        height:1px;
        z-index: 2;
      }
    </style>
  </head>
  <body>
  <div class="container-fluid">
        <div class="row top_bar">
          <div class="col-12 logo_frame">
              <div class="container"> 
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="row">
                        <div class="col-12 top_logo">
                          <img src="{{asset('img/logo.png')}}" alt="">
                          <span class="main_title">Bunny Run</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                      <div class="row">
                      <div class="col-lg-5 offset-lg-3 col-md-6 sign_in">
                        <div class="smaill_size_link"><a href="#">Sign In</a></div>
                        <div class="normal_link"><a href="">Create New Member</a></div>
                      </div>
                      <div class="col-lg-4 col-md-6 help">
                        <div class="smaill_size_link"><a href="#">Neet to Help</a></div>
                        <div class="normal_link"><a href="">+959 421 011541</a></div>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <!-- start mobile menu -->
          <div class="mobile_hd_frame">
            <div class="container-fluid">
              <div class="row">
              <div class="mobile_logo_frame">
                <img src="{{asset('img/logo.png')}}" alt="">
                <span class="main_title">Bunny Run</span>
              </div>
              <div class="mobile_signin_frame">
                  <div class="smaill_size_link"><a href="#">Sign In</a></div>
                  <div class="normal_link"><a href="">Create New Member</a></div>
              </div>
              <div class="mobile_menu_frame">
                  <div class="m_menu_bar" style="z-index:11; position:relative;">
                  <button class="header__button" id="btnNav" type="button">
                    <i class="fas fa-bars"></i>
                  </button>
                  </div>
                  <div class="m_search_frame">
                    <div class="row">
                      <div class="col-9 mobile_track_search_box">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Track Package" style="height:32px;">
                        <span class="input-group-text"><i class="fa fa-search-location"></i></span>
                      </div>
                      </div>
                      <div class="col-3 mobile_quick_start">
                        <a href="#">
                          <i class="fas fa-paper-plane"></i>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            </div>
          </div>
          <!-- end mobile menu -->
        </div>
    </div>
    @php
      $check_link = Request::segment(1)
    @endphp
    <div class="container-fluid sticky">
    <div class="col-12">
          <div class="container"> 
                  <div class="row menu_frame">
                    <div class="col-12">
                      <div class="row">
                      <div class="col-lg-10 col-md-11">
                    
                        <ul class="menu">
                          <li><a href="{{url('/')}}" style="color:@php if($check_link==''){echo 'red';} @endphp">Home </a> <div class="bg_box">Home</div></li>
                          <li><a href="{{url('/services')}}" style="color:@php if($check_link=='services'){echo 'red';} @endphp">Services</a> <div class="bg_box">Services</div></li>
                          <li><a href="{{url('/pricing')}}" style="color:@php if($check_link=='pricing'){echo 'red';} @endphp">Pricing</a> <div class="bg_box">Pricing</div></li>
                          <li><a href="{{url('/blog')}}" style="color:@php if($check_link=='blog'){echo 'red';} @endphp">Blog</a> <div class="bg_box">Blog</div></li>
                          <li><a href="{{url('/about')}}" style="color:@php if($check_link=='about'){echo 'red';} @endphp">About Us</a> <div class="bg_box">About Us</div></li>
                          <li><a href="{{url('/contact')}}" style="color:@php if($check_link=='contact'){echo 'red';} @endphp">Contact Us</a> <div class="bg_box">Contact Us</div></li>
                          
                        </ul>
                      </div>
                      <div class="col-lg-2 col-md-1 quick_send_icon">
                        <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        </a>
                      </div>
                      </div>
                    </div>
                  </div>
                
              </div>
          </div>
          
    </div>
    <nav class="nav">
        <div class="nav__links">
            <a href="#" class="nav__link" style="height:71px;">
            <img src="{{asset('img/logo.png')}}" alt="">
            <span class="main_title">Bunny Run</span>
            </a>
            <a class="nav__link nav__link--active" href="{{url('/')}}">
                <i class="fa fa-home"></i>
                Home
            </a>
            <a class="nav__link" href="{{url('/services')}}">
                <i class="fa fa-dolly"></i>
                Services
            </a>
            <a class="nav__link" href="{{url('/pricing')}}">
                <i class="fa fa-hand-holding-usd"></i>
                Pricing
            </a>
            <a class="nav__link" href="{{url('/blog')}}">
                <i class="fa fa-comment-alt"></i>
                Blog
            </a>
            <a class="nav__link" href="{{url('/about')}}">
                <i class="fa fa-flag"></i>
                About Us
            </a>
            <a class="nav__link" href="{{url('/contact')}}">
                <i class="fa fa-address-card"></i>
                Contact Us
            </a>
        </div>
        <div class="nav__overlay"></div>
    </nav>
    @yield('content')
    <div class="container-fluid footer_frame">
        <div class="footer_info">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-6 footer_logo">
                <img src="{{asset('img/footer_logo.png')}}" alt="">
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6 footer_menu">
                <div class="foot_hd_text">Links</div>
                <div class="links_box ">
                  <div class="foot_left_link">
                    <ul style="" class="">
                      <li>Home</li>
                      <li>About</li>
                      <li>Services</li>
                    </ul>
                  </div>
                  <div class="foot_right_link">
                    <ul style="" class="">
                      <li>Home</li>
                      <li>About</li>
                      <li>Services</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6 footer_menu">
                <div class="foot_hd_text">Quick Send</div>
                <div class="links_box ">
                  <div class="">
                    <ul style="" class="">
                      <li>Quick Start Now!</li>
                      <li>
                      <button type="button" class="btn foot_quick_start_button" style="border-radius:0;"><i class="fas fa-paper-plane"></i> &nbsp; START</button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6 footer_menu">
                <div class="foot_hd_text">We Accept</div>
                <div class="links_box ">
                  <div class="">
                    <ul style="" class="">
                      <li>
                        <img src="{{asset('img/ok_icon.jpg')}}" alt="">
                        <img src="{{asset('img/master_icon.jpg')}}" alt="">
                        <img src="{{asset('img/visa_icon.jpg')}}" alt="">
                      </li>
                      <li>
                      <img src="{{asset('img/mpu_icon.jpg')}}" alt="">
                        <img src="{{asset('img/kpay_icon.jpg')}}" alt="">
                        <img src="{{asset('img/aya_icon.jpg')}}" alt="">
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row footer_copyright">
            <div class="col-lg-6 col-md-6 col-sm-6 foot_copy_text">
              &copy; copyright : 2022 allright reserved.
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 foot_dev_text">
              Develop By <span>Lh</span>@
              <img src="{{asset('img/icg_logo.png')}}" alt="" style="width:40px; margin-top:-7px;">
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
      <script>
                window.addEventListener("load", () => {
            document.body.classList.remove("preload");
        });

        document.addEventListener("DOMContentLoaded", () => {
            const nav = document.querySelector(".nav");

            document.querySelector("#btnNav").addEventListener("click", () => {
                nav.classList.add("nav--open");
            });

            document.querySelector(".nav__overlay").addEventListener("click", () => {
                nav.classList.remove("nav--open");
            });
        });
        </script>
  </body>
</html>
