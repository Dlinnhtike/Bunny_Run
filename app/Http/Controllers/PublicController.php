<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cookie;
use Hash;
use Session;
class PublicController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::where('user_name','=',$req->username)->first();
        if($user){
            if($req->has('remember_me')){
                //remember 1 day
               Cookie::queue('username',$req->username,1440); 
               Cookie::queue('password',$req->password,1440); 
            }
            else{
                Cookie::queue('username',$req->username,-1440); 
                Cookie::queue('password',$req->password,-1440);
            }
            //return back()->with('success','Login OK');
            if(Hash::check($req->password, $user->password)){
                // Only one data put in to the session
                //$req->session()->put('UserId',$user->id);
                $req->session()->put('pubUsersession',['UserId' => $user->id, 'UserName'=> $user->user_name]);
                return redirect('/userprofile');
            }
            else{
                return back()->with('fail','Password not matches!');  
            }
        }
        else{
            return back()->with('fail','This User Name is not registered!');
        }
    }
    public function userlogout(){
        if(Session::has('pubUsersession')){
            Session::pull('pubUsersession');
           return redirect('/');
        }
    }
    public function order_request()
    {
        $state = DB::table('states')->get();
       return view('deliform',['state'=>$state]);
    }
    public function order_success()
    {
        echo "Order Success";
    }
    public function donthave()
    {
        return view('donthave');
    }
    public function onetime_form()
    {
        $state = DB::table('states')->get();
        return view('onetime_form',['state'=>$state]);
    }
    public function userprofile(){
        $id =Session::get('pubUsersession')['UserId'];
        //$data = Order::where('user_id',$id)->orderBy('id','desc')->get();
        $data = Order::join('states', 'states.id', '=', 'deli_order.to_state')
            ->where('deli_order.user_id', $id)
            ->orderBy('id','desc')
            ->get(['deli_order.*', 'states.state_name']);
        return view('userprofile',['orders'=>$data]);
    }
    public function usersetting()
    {
        $id =Session::get('pubUsersession')['UserId'];
        //$data = Order::where('user_id',$id)->orderBy('id','desc')->get();
        $data = Order::join('states', 'states.id', '=', 'deli_order.to_state')
            ->where('deli_order.user_id', $id)
            ->orderBy('id','desc')
            ->get(['deli_order.*', 'states.state_name']);
        return view('usersetting',['orders'=>$data]);
    }
    public function changepassword()
    {
        $id =Session::get('pubUsersession')['UserId'];
        //$data = Order::where('user_id',$id)->orderBy('id','desc')->get();
        $data = Order::join('states', 'states.id', '=', 'deli_order.to_state')
            ->where('deli_order.user_id', $id)
            ->orderBy('id','desc')
            ->get(['deli_order.*', 'states.state_name']);
        return view('changepassword',['orders'=>$data]);
    }
}
