<?php

namespace App\Http\Controllers;
use App\Models\SystemUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Cookie;
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
            if($req->has('remember_me')){
                //remember 1 day
               Cookie::queue('username',$req->name,1440); 
               Cookie::queue('password',$req->password,1440); 
            }
            else{
                Cookie::queue('username',$req->name,-1440); 
                Cookie::queue('password',$req->password,-1440);
            }
            //return back()->with('success','Login OK');
            if(Hash::check($req->password, $user->password)){
                // Only one data put in to the session
                //$req->session()->put('UserId',$user->id);
                $req->session()->put('Usersession',['UserId' => $user->id, 'UserName'=> $user->username,'UserType'=> $user->usertypeID]);
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
        if(Session::has('Usersession')){
            Session::pull('Usersession');
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
    public function user_list(){
        $data = SystemUser::orderBy('id','desc')->paginate(30);
        return view('admin.system_users',['users'=>$data]);
    }
    public function editsystem_user($id){
        $detail = SystemUser::find($id);
        return view('admin.editsystem_user',['userdata'=>$detail]);
    }
    public function update_systemuser(Request $req){
        $req->validate([
            'username' => 'required',
            'email'=> 'required|email',
            'usertypeID' => 'required'
        ]);
        if($req->password!=''){
            $user = SystemUser::find($req->id);
            $user->username = $req->username;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->usertypeID = $req->usertypeID;
        }
        else{
            $user = SystemUser::find($req->id);
            $user->username = $req->username;
            $user->email = $req->email;
            $user->usertypeID = $req->usertypeID;
        }
       $result = $user->save();
       if($result){
            return redirect('system/userlist')->with('success','Save Successfull!');
       }
       else{
            return back()->with('fail','Something wrong');
       }
    }
    public function user_profile(){
        return view('admin.profile');
    }
}
