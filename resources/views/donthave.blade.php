@extends('layouts.public_master')
@section('title','User Login')
@section('content')
<style>
  * {
    font-family: -apple-system, BlinkMacSystemFont, "San Francisco", Helvetica, Arial, sans-serif;
  font-weight:  300; 
  margin:  0; 
}
$primary: rgb(182,157,230); 	

h4 {
  font-size:  24px; 
  font-weight:  600; 
  color:  #000; 
  opacity:  .85; 
}
label {
  font-size:  12.5px; 
  color:  #000;
  opacity:  .8;
  font-weight:  400; 
}
form {
  padding:  40px 30px; 
  background:  #fefefe; 
  display:  flex; 
  flex-direction:  column;
  align-items:  flex-start; 
  padding-bottom:  20px; 
  width:  300px; 
  h4 {
    margin-bottom:  20px;
    color:  rgba(#000, .5);
    span {
      color:  rgba(#000, 1);
      font-weight:  700; 
    }
  }
  p {
    line-height:  155%; 
    margin-bottom:  5px; 
    font-size:  14px; 
    color:  #000; 
    opacity:  .65;
    font-weight:  400; 
    max-width:  200px; 
    margin-bottom:  40px; 
  }
}

input {
  font-size:  16px; 
  padding:  20px 0px; 
  height:  40px; 
  border:  none; 
  border-bottom:  solid 1px rgba(0,0,0,.1); 
  background:  #fff; 
  width:  280px; 
  box-sizing:  border-box; 
  transition:  all .3s linear; 
  color:  #000; 
  font-weight:  400;
  -webkit-appearance:  none; 
  &:focus {
    border-bottom:  solid 1px $primary; 
    outline: 0; 
   box-shadow:  0 2px 6px -8px rgba($primary, .45); 
  }
}
.floating-label {
  position:  relative; 
  margin-bottom:  10px;
  width:  100%; 
  label {
    position:  absolute; 
    top: calc(50% - 7px);
    left:  0; 
    opacity:  0; 
    transition:  all .3s ease; 
    padding-left:  44px; 
  }
  input {
    width:  calc(100% - 44px); 
    margin-left:  auto;
    display:  flex; 
  }
 
  input:not(:placeholder-shown) {
    padding:  28px 0px 12px 0px; 
  }
  input:not(:placeholder-shown) + label {
    transform:  translateY(-10px); 
    opacity:  .7; 
  }
  input:valid:not(:placeholder-shown) + label + .icon {
    svg {
      opacity:  1; 
      path {
        fill:  $primary; 
      }      
    }
  }
  input:not(:valid):not(:focus) + label + .icon {
    animation-name: shake-shake;
    animation-duration: .3s;
  }
}
a:link{color:#4a4a4a;}
a:hover{color:#f62d2d;}
.overlay_text{
    min-width:290px;
    min-height:130px;
    background: rgba(255, 255, 227, 0.6);
    position: absolute;
    z-index: 1;
    margin-top:40px;
    border-top-right-radius:7px;
    border-bottom-right-radius:7px;
    padding-left:15px;
    padding-top:25px;
}
</style>
<div class="container-fluid body_frame" style="background:#f1f1f1;">
   
   <div class="container ">
        <div class="row">
           <div class="col-lg-8 offset-lg-2 success_login_frame">
                <div class="row">
                @if(Session::has('fail'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Sorry!</strong> {{Session::get('fail')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                    <div class="col-lg-5 col-md-5 login_left_bg">
                        <div class="overlay_text">
                            <p>Dear Customer!<br><small><i>You Don't have an accout?</i> <br>
                                <a href="{{url('/registration')}}" style="color:blue;"><u>Create Account </u> </a>
                                Or 
                                <a href="{{url('/onetime_form')}}" style="color:red;">Use OneTime User</a>
                            </small></p>
                        </div>
                        <img src="{{asset('img/login_bg.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-7 col-md-7 login_right_form">
                    <form action="{{url('login')}}" class="log-in" autocomplete="off" method="POST"> 
                        @csrf
                    <h4 style="color:#5e5f61;">User <span style="color:#000;">LOGIN</span></h4>
                    <p>Dear Customer! You already account? Please, Login here.</p>
                    <div class="floating-label">
                        <input placeholder="User Name" type="text" name="username" id="" autocomplete="off" style="outline: 0;">
                        <span class="text-danger"> @error('username') {{$message}} @enderror</span>
                      </div>
                    <div class="floating-label">
                    <label for="password"></label>
                        <input placeholder="Password" type="password" name="password" id="" autocomplete="off" style="outline: 0;" >
                        <span class="text-danger"> @error('password') {{$message}} @enderror</span>
                      </div> 
                        <button type="submit" class="btn btn-primary">Log in</button>
                        <a href="#"><small>Forgot your password?</small></a>
                    </form>
                    </div>
                </div>
           </div>
       </div>
       
   </div>
</div>

   
@endsection