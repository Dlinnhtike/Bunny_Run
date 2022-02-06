<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Delimen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Cookie;
use Hash;
use Session;

class PeopleController extends Controller
{
    public function users(){
        $users = User::orderBy('id','desc')->get();
        return view('people.users',['users'=>$users]);
    }
    public function clients(){
        $users = User::orderBy('id','desc')->get();
        return view('people.clients',['users'=>$users]);
    }
    public function delimen(){
        $state = DB::table('states')->get();
        $zone = DB::table('zones')->get();
        $delimen = Delimen::join('states','states.id','=','delivery_men.state_id')
                ->join('zones','zones.id','=','delivery_men.zone_id')
                ->orderBy('delivery_men.id','desc')
                ->get(['delivery_men.*','states.state_name','zones.zone_name']);
        return view('people.delimen',['state'=>$state,'zone'=>$zone,'delimen'=>$delimen]);
    }
    public function registration(Request $req)
    {
        $req->validate([
            'user_name' => 'required|min:3',
            'password'=>'required|min:5|same:con_password',
            'con_password' => 'required|min:5',
            'phone' => 'required',
            'state' => 'required'
        ]);
        $data = new User;
        $data->user_name = $req->user_name;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        $data->phone = $req->phone;
        $data->address = $req->address;
        $data->township = $req->township;
        $data->member_type= 0;
        $data->state = $req->state;
        $data->user_name = $req->user_name;
        $result = $data->save();
        if($result){
            //return redirect('/success_login');
            return redirect('success_login')->with( 'user_name', $req->user_name);
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function edit_user($id)
    {
        $user = User::find($id);
        return view('people.edit_user',['user'=>$user]);
    }

    public function update_user(Request $req){
        if($req->password !="")
        {
            $data = User::find($req->id);
            $data->user_name = $req->username;
            $data->email = $req->email;
            $data->password = Hash::make($req->password);
            $data->phone = $req->phone;
            $data->address = $req->address;
            $data->township = $req->township;
            $data->member_type= 0;
            $data->state = $req->state;
            $data->status = $req->status;
        }
        else{
            $data = User::find($req->id);
            $data->user_name = $req->username;
            $data->email = $req->email;
            $data->phone = $req->phone;
            $data->address = $req->address;
            $data->township = $req->township;
            $data->member_type= 0;
            $data->state = $req->state;
            $data->status = $req->status;
        }

        $result = $data->save();
        if($result){
            //return redirect('/success_login');
            return redirect('people/users')->with( 'success', 'Updated Successfull!');
        }else{
            return back()->with('fail','Something wrong');
        }
    }

    public function delete_user($id){
        $data = User::find($id);
        $data->delete();
        return redirect('people/users')->with('success','Delete Successfull!');
    }

    public function detail_user($id)
    {
        //$user = User::find($id);
        $data = Order::join('states', 'states.id', '=', 'deli_order.to_state')
            ->where('deli_order.user_id', $id)
            ->orderBy('id','desc')
            ->get(['deli_order.*', 'states.state_name']);
        return view('people.detail_user',['orderlist'=>$data]);
    }

    public function create_delimen(Request $req){
        $req->validate([
            'name' => 'required|min:3',
            'password'=>'required|min:5|same:confirm_password',
            'confirm_password' => 'required|min:5'
        ]);
        $data = new Delimen;
        $data->name = $req->name;
        $data->phone = $req->phone;
        $data->password = Hash::make($req->password);
        $data->address = $req->address;
        $data->township = $req->township;
        $data->state_id = $req->state;
        $data->zone_id = $req->zone;
        $result = $data->save();
        if($result){
            //return redirect('/success_login');
            return redirect('people/delimen')->with( 'success', "Save Successfull");
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function edit_delimen($id){
        $state = DB::table('states')->get();
        $zone = DB::table('zones')->get();
        $men = Delimen::join('states','states.id','=','delivery_men.state_id')
            ->join('zones','zones.id','=','delivery_men.zone_id')
            ->where('delivery_men.id',$id)
            ->get(['delivery_men.*','states.state_name','zones.zone_name'])->first();
        return view('people.edit_delimen',['state'=>$state,'zone'=>$zone,'men'=>$men]);
    }
    public function update_men(Request $req){
        if($req->password!=""){
            $data = Delimen::find($req->id);
            $data->name = $req->name;
            $data->phone = $req->phone;
            $data->password = Hash::make($req->password);
            $data->address = $req->address;
            $data->township = $req->township;
            $data->state_id = $req->state;
            $data->zone_id = $req->zone;
        }
        else{
            $data = Delimen::find($req->id);
            $data->name = $req->name;
            $data->phone = $req->phone;
            $data->address = $req->address;
            $data->township = $req->township;
            $data->state_id = $req->state;
            $data->zone_id = $req->zone;
        }
        $result = $data->save();
        if($result){
            //return redirect('/success_login');
            return redirect('people/delimen')->with( 'success', "Save Successfull");
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function delete_delimen($id){
        $data = Delimen::find($id); 
        $data->delete();
        return redirect('people/delimen')->with( 'success', "Delete Successfull");

    }
}
