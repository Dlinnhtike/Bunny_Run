@extends('layouts.public_master')
@section('title','Deli Form')
@section('content')
<style>
  .form-control{color:#6a6868;}
  .tab-pane{min-height:300px;}
  </style>
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
            <h1 class="content_heading_text" style="margin-top:50px;">Deli Order Request Form</h1>
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
           <div class="col-lg-12 reg_form_frame">
           <form action="order/create" method="post" id="registration" enctype="multipart/form-data">
             @csrf
          <nav>
            <div class="nav nav-tabs nav-fill normal_tab" id="nav-tab" role="tablist">
              <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">Deli Information</a>
              <a class="nav-link" id="step2-tab" data-bs-toggle="tab" href="#step2" style="cursor: default;" disabled >Parcel Information</a>
              <a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step3" style="cursor: default;" disabled >Photo</a>
			  <a class="nav-link" id="final-tab" data-bs-toggle="tab" href="#final" style="cursor: default;" disabled >Confirm</a>
            </div>
          </nav>
          <?php 
            if(isset(Session::get('pubUsersession')['UserId'])){
              $id =Session::get('pubUsersession')['UserId'];
              $user = DB::table('users')->where('id',$id)->first();
            }
          ?>
          <div class="tab-content py-4" style="background:#fff; padding:10px; border:1px solid #ddd; border-top:none;">
            <div class="tab-pane fade show active" id="step1">
              <h4>Deli Information</h4>
              <div class="row g-3">
                    <div class="col-lg-6 col-md-6">
                        <p style="color:#2f7fbe;">Sender Information</p>
                        <label for="Name" class="form-label">From Name</label>
                        <input type="text" class="form-control margin_bottom_10" id="" name="name" value="{{$user->user_name}}" required>
                        <input type="hidden" name="user_id" value="{{$id}}">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" class="form-control margin_bottom_10" id="" name="phone" value="{{$user->phone}}" required>
                    
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control margin_bottom_10" id="" name="address" value="{{$user->address}}" required>
                    
                        <label for="" class="form-label">Township/City</label>
                        <select name="township" id="townshiplist" class="form-control margin_bottom_10" required>
                        <option value="{{$user->township}}">{{$user->township}}</option>
                        </select>
                    
                        <label for="" class="form-label">State</label>
                        <select name="state" id="state" class="form-control" required>
                          <option value="">Select State</option>
                          @foreach($state as $value)
                              <option value="{{$value->id}}" {{($value->id==$user->state) ? 'selected' : ''}}>{{$value->state_name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <p style="color:#c50501;">Receiver Information</p>
                        <label for="Name" class="form-label">To Name</label>
                        <input type="text" class="form-control margin_bottom_10" id="" name="to_name" value="{{old('username')}}" required>

                        <label for="" class="form-label">Phone</label>
                        <input type="text" class="form-control margin_bottom_10" id="" name="to_phone" value="{{old('username')}}" required>
                    
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control margin_bottom_10" id="" name="to_address" value="{{old('username')}}" required>
                    
                        <label for="" class="form-label">Township/City</label>
                        <select name="to_township" id="to_townshiplist" class="form-control margin_bottom_10" required>
                            <option value="">First Select State</option>
                            
                        </select>
                    
                        <label for="" class="form-label">State</label>
                        <select name="to_state" id="to_state" class="form-control" required>
                            <option value="">Select State</option>
                            @foreach($state as $value)
                              <option value="{{$value->id}}">{{$value->state_name}}</option>
                          @endforeach
                        </select>
                       
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="step2">
              <h4>Parcel Information</h4>
              <div class="row g-3">
                <div class="col-12">
                  <label for="">About Of Parcel</label>
                  <input type="text" name="about_parcel" class="form-control" id="" value="{{old('username')}}">
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="" class="form-label">Width ( inches )</label>
                    <input type="text" class="form-control margin_bottom_10" id="" name="width" value="{{old('username')}}" >
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="" class="form-label">Height ( inches )</label>
                    <input type="text" class="form-control margin_bottom_10" id="" name="height" value="{{old('username')}}">
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="" class="form-label">Lenght ( inches )</label>
                    <input type="text" class="form-control margin_bottom_10" id="" name="length" value="{{old('username')}}">
                </div>

                <div class="col-lg-4 col-md-4">
                    <label for="" class="form-label">Number Of Parcel</label>
                    <input type="text" class="form-control margin_bottom_10" id="" name="no_of_parcel" value="{{old('username')}}">
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="" class="form-label">Deli Type</label>
                    <select name="deli_type" id="" class="form-control" required>
                      <option value="Normal" >Normal</option>
                      <option value="type1">Within One Day</option>
                      <option value="type2">Within Two Days</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="form-check" style="margin-top:25px;">
                    <input class="form-check-input" type="radio" name="paystatus" value="Pay Delivery Fee" required>
                    <label class="form-check-label" for="">
                      Pay Delivery Fee
                    </label>
                  </div>
                  <div class="form-check" style="">
                    <input class="form-check-input" type="radio" name="paystatus" value="Pay From Receiver">
                    <label class="form-check-label" for="">
                      Pay From Receiver
                    </label>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="" class="form-label">Available Pickup Date</label>
                    <input type="date" class="form-control margin_bottom_10" id="" name="av_pk_date" required>
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="" class="form-label">Insurance</label>
                    <select name="insurance" id="" class="form-control" required>
                      <option value="None">None</option>
                      <option value="type1">Type One</option>
                      <option value="type2">Type Two</option>
                    </select>
                </div>
              </div>
            </div>
			<div class="tab-pane fade" id="step3">
              <h4>Upload Parcel Photos</h4>
              <div class="mb-3">
                <label for="">Photo 1</label><span class="text-danger">@error('photo1') {{$message}} @enderror</span>
                <input type="file" name="photo1" class="form-control" id="">
              </div>
              <div class="mb-3">
              <label for="">Photo 2</label><span class="text-danger">@error('photo3') {{$message}} @enderror</span>
                <input type="file" name="photo2" class="form-control" id="">
              </div>
              <div class="mb-3">
                <label for="">Photo 3</label><span class="text-danger">@error('photo2') {{$message}} @enderror</span>
                <input type="file" name="photo3" class="form-control" id="">
              </div>
            </div>
            <div class="tab-pane fade" id="final">
              <h4>Delivery Order Confirmation</h4>
              <p>
                <ul>
                  <li>Thank you for your Order!</li>
                  <li>Your order will be delivered within the next [X] days</li>
                  <li>We will Confirm and process your order as soon as</li>
                </ul>
              </p>
            </div>
          </div>
          <div class="row justify-content-between" style="padding-top:10px;">
            <div class="col-auto"><button type="button" class="btn" data-enchanter="previous"><i class="fa fa-backward"></i> Previous</button></div>
            <div class="col-auto">
              <button type="button" class="btn" data-enchanter="next">Next <i class="fa fa-forward"></i></button>
              <button type="reset" class="btn btn-secondary" data-enchanter="cancel">Reset</button>
              <button type="submit" class="btn btn-primary" data-enchanter="finish">Confirm & Send</button>
            </div>
          </div>
        </form>
            
           </div>
       </div>
   </div>
</div>
@endsection
<!-- JavaScript and dependencies -->
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
    $("#state").change(function(){
      
      var id = $(this).val();
      var div=$(this).parent();
      var op=" ";
            $.ajax
            ({
                type: "get",
                url: "/office/gettownship",
                //url:'{!!URL::to('gettownship')!!}',
                dataType: 'json',
                data: {'id':id},
                success: function (data) {
                    op+='<option value="0" selected disabled>Select Township</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].township_name+'">'+data[i].township_name+'</option>';
                            }
                        document.getElementById('townshiplist').innerHTML=op;
                }
            })
        });
        $("#to_state").change(function(){
          
      var id = $(this).val();
      
      var div=$(this).parent();
      var op=" ";
            $.ajax
            ({
                type: "get",
                url: "/office/gettownship",
                //url:'{!!URL::to('gettownship')!!}',
                dataType: 'json',
                data: {'id':id},
                success: function (data) {
                    op+='<option value="0" selected disabled>Select Township</option>';
                            for(var i=0;i<data.length;i++){
                                op+='<option value="'+data[i].township_name+'">'+data[i].township_name+'</option>';
                            }
                        document.getElementById('to_townshiplist').innerHTML=op;
                }
            })
        });
});
</script>
