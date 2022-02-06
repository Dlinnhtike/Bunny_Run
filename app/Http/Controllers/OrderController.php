<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cookie;
use Hash;
use Session;
class OrderController extends Controller
{
    public function member_order_list()
    {
        $data = Order::join('states', 'states.id', '=', 'deli_order.from_state')
                ->where('deli_order.user_type', 2)
                ->orderBy('id','desc')
                ->get(['deli_order.*', 'states.state_name']);
        return view('order.member_order_list',['orders'=>$data]);
    }
    public function onetime_order_list()
    {
        $data = Order::join('states', 'states.id', '=', 'deli_order.from_state')
                ->where('deli_order.user_type', 3)
                ->orderBy('id','desc')
                ->get(['deli_order.*', 'states.state_name']);
        return view('order.onetime_order_list',['orders'=>$data]);
    }
    public function client_order_list()
    {
        $data = Order::join('states', 'states.id', '=', 'deli_order.from_state')
                ->where('deli_order.user_type', 1)
                ->orderBy('id','desc')
                ->get(['deli_order.*', 'states.state_name']);
        return view('order.client_order_list',['orders'=>$data]);
    }
    public function add_order(Request $req) 
    {
        $photo_validate = $req->validate([
            'photo1' => 'image|mimes:jpg,png,jpeg',
            'photo2' => 'image|mimes:jpg,png,jpeg',
            'photo2' => 'image|mimes:jpg,png,jpeg'
           ]);
           //$name = $request->file('image')->getClientOriginalName();
    
        $req->validate([ 
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'township' => 'required',
            'state' => 'required',
            'to_name' => 'required',
            'to_phone' => 'required',
            'to_address' => 'required',
            'to_township' => 'required',
            'to_state' => 'required',
            'paystatus' => 'required',
            'av_pk_date' => 'required'
            ]);

            $data = new Order;
            $data->user_id = $req->user_id;
            $data->from_name = $req->name;
            $data->from_phone = $req->phone;
            $data->from_address = $req->address;
            $data->from_township = $req->township;
            $data->from_state = $req->state;
            $data->to_name = $req->to_name;
            $data->to_phone = $req->to_phone;
            $data->to_address = $req->to_address;
            $data->to_township = $req->to_township;
            $data->to_state = $req->to_state;
            $data->user_type = 2;
            $data->deli_type = $req->deli_type;
            $data->pay_status = $req->paystatus;
            $data->a_pk_date = $req->av_pk_date;
            $data->insurance = $req->insurance;
            $data->status = 1;
           $result = $data->save();
           
           if($result){
               if($req->file('photo1')!=""){
                $path_1 = $req->file('photo1')->store('public/images');
               }
               else{ $path_1="";}
               if($req->file('photo2')!=""){
                $path_2 = $req->file('photo2')->store('public/images');
               }else{ $path_2="";}
               if($req->file('photo3')!=""){
                $path_3 = $req->file('photo3')->store('public/images');
               }else{ $path_3="";}
            
                $inserted_id = $data->id;
                DB::table('order_detail')->insert([
                    'order_id' => $inserted_id,
                    'about_parcel' => $req->about_parcel,
                    'width' => $req->width,
                    'height' => $req->height,
                    'length' => $req->length,
                    'no_of_parcel' => $req->no_of_parcel,
                    'photo_1' => $path_1,
                    'photo_2' => $path_2,
                    'photo_3' => $path_3
                ]);
                return redirect('/order_success');
                //return back()->with('success','You have registered successluly');
           }
           else{
                return back()->with('fail','Something wrong');
           }
    }

    public function order_detail($id)
    {
        $data = Order::join('order_detail', 'order_detail.order_id', '=', 'deli_order.id')
                ->where('deli_order.id',$id)
                ->get(['order_detail.*', 'deli_order.*'])
                ->first();
        return view('order.order_detail',['detail'=>$data]);
    }

}
