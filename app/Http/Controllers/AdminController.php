<?php

namespace App\Http\Controllers;
use App\Models\SystemUser;
use Illuminate\Http\Request;
use Hash;
use Session;
class AdminController extends Controller
{
    public function systemuser_login(Request $req){
        $req->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $user = SystemUser::where('username','=',$req->name)->first();
        if($user){
            //return back()->with('success','Login OK');
            if(Hash::check($req->password, $user->password)){
                $req->session()->put('UserId',$user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail','Password not matches!');  
            }
        }
        else{
            return back()->with('fail','This User Name is not registered!');
        }
    }
    public function logout(){
        if(Session::has('UserId')){
            Session::pull('UserId');
           return redirect('adminApanel');
        }
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function createUser(){
        return view('admin.create_user');
    }
    public function add_system_user(Request $req){
        
        $req->validate([ 
            'username' => 'required|min:3',
            'email'=> 'required|email|unique:system_users',
            'password'=>'required|min:5|same:confirm_password',
            'confirm_password' => 'required|min:5',
            'usertypeID' => 'required',
            'empID' => 'required',
        ]);
        $user = SystemUser::all();
        $data = new SystemUser;
        $data->username = $req->username;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        $data->usertypeID = $req->usertypeID;
        $data->empID = $req->empID;
       $result = $data->save();
       if($result){
        
            return back()->with('success','You have registered successluly');
       }
       else{
            return back()->with('fail','Something wrong');
       }
    }
}
