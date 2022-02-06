<?php

namespace App\Http\Controllers;
use App\Models\SystemUser;
use App\Models\Township;
use App\Models\Branch;
use App\Models\Employee;
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
                $req->session()->put('Usersession',['UserId' => $user->id, 'UserName'=> $user->username,'UserType'=> $user->usertypeID,'branch'=>$user->branch,'state'=>$user->state]);
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
        $data = Branch::all();
        return view('admin.create_user',['branch'=>$data]);
    }
    public function add_system_user(Request $req){
        
        $req->validate([ 
            'username' => 'required|min:3',
            'email'=> 'required|email|unique:system_users',
            'password'=>'required|min:5|same:confirm_password',
            'confirm_password' => 'required|min:5',
            'usertypeID' => 'required',
            'empID' => 'required',
            'branch' => 'required',
        ]);
        //get state id form employee table
        $state_id = Employee::find($req->empID);
        $user = SystemUser::all();
        $data = new SystemUser;
        $data->username = $req->username;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        $data->usertypeID = $req->usertypeID;
        $data->empID = $req->empID;
        $data->branch = $req->branch;
        $data->state = $state_id->state_id;
       $result = $data->save();
       if($result){
        
            return back()->with('success','You have registered successluly');
       }
       else{
            return back()->with('fail','Something wrong');
       }
    }
    public function getemplist(Request $req)
    {
        //$data = Township::all();
        $data = Employee::select('*')->where('branch_id',$req->id)->get();
        return response()->json($data);
    }
    public function user_list(){
        $data = SystemUser::orderBy('id','desc')->simplePaginate(30);
        return view('admin.system_users',['users'=>$data]);
    }
    public function editsystem_user($id){
        $data = Branch::all();
        $detail = SystemUser::find($id);
        return view('admin.editsystem_user',['userdata'=>$detail,'branch'=>$data]);
    }
    public function update_systemuser(Request $req){
        $req->validate([
            'username' => 'required',
            'email'=> 'required|email',
            'usertypeID' => 'required',
            'empID' => 'required'
        ]);
        $state_id = Employee::find($req->empID);
        if($req->password!=''){
            $user = SystemUser::find($req->id);
            $user->username = $req->username;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->usertypeID = $req->usertypeID;
            $user->empID = $req->empID;
            $user->branch = $req->branch;
            $user->state = $state_id->state_id;
        }
        else{
            $user = SystemUser::find($req->id);
            $user->username = $req->username;
            $user->email = $req->email;
            $user->usertypeID = $req->usertypeID;
            $user->empID = $req->empID;
            $user->branch = $req->branch;
            $user->state = $state_id->state_id;
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
    public function infosystem_user($id){
        $detail = SystemUser::find($id);
        return view('admin.infosystem_user',['userdata'=>$detail]);
    }
    public function deletesystem_user($id){
        $data = SystemUser::find($id);
        $data->delete();
        return redirect('system/userlist')->with('success','Delete Successfull!');
    }
    public function change_systemuser_password(Request $req)
    {
        $user = SystemUser::find($req->id);
        if(Hash::check($req->current, $user->password)){
            $req->validate([ 
            'newpassword'=>'required|min:5|same:confirmpassword',
            'confirmpassword' => 'required|min:5'
            ]);
            $user = SystemUser::find($req->id);
            $user->password = Hash::make($req->newpassword);
            $result = $user->save();
                if($result){
                    return redirect('logout');
                }
        }
        else{
            return back()->with('fail','Sorry! Do not match current password');
        }
    }
    public function township(){
        $state = DB::table('states')->get();
        $town = Township::orderBy('id','desc')->paginate(30);
        return view('admin.township',['township_data'=>$town,'state'=>$state]);
    }
    public function create_township(Request $req){
        $req->validate([
            'township_name' => 'required',
            'state' => 'required'
        ]);
        $data = new Township;
        $data->township_name = $req->township_name;
        $data->state_id = $req->state;
        $result = $data->save();
        if($result){
            return redirect('system/township')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function zone(){
        $zone = DB::table('zones')->get();
        $state = DB::table('states')->get();
        return view('admin.zone',['state'=>$state,'zones'=>$zone]);
    }
    public function gettownship(Request $req)
    {
        //$data = Township::all();
        $data = Township::select('*')->where('state_id',$req->id)->get();
        return response()->json($data);
    
    }
    public function create_zone(Request $req)
    {
        $req->validate([ 
            'zone_name' => 'required',
            'state'=> 'required',
            'township'=> 'required'
        ]);

        if(!empty($req->input('township'))){
            $id = \DB::table('zones')->insertGetId([
                'state_id' => $req->state,
                'zone_name' => $req->zone_name,
            ]);
            $will_insert = [];
            foreach($req->input('township') as $key=> $value){
                array_push($will_insert,['township_name'=>$value,'zone_id'=>$id]);
            } 
            $data = \DB::table('zone_detail')->insert($will_insert);
            if($data){
                return redirect('system/zone')->with('success','Save successluly');
            }
            else{
                return back()->with('fail',"Please, Choose Township.");
            }
        }
        else{
            return back()->with('fail',"Please, Choose Township.");
        }
        
    }
}
