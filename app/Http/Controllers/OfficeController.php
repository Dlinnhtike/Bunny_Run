<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Township;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Cookie;
use Hash;
use Session;

class OfficeController extends Controller
{
    public function department()
    {
        $data = Department::orderBy('id','desc')->paginate(30);
        $posdata = DB::table('positions')->orderBy('id','desc')->paginate(30);
        return view('admin.department',['department'=>$data,'position'=>$posdata]);
    }
    public function create_dept(Request $req)
    {
        $req->validate([
            'dept_name' => 'required'
        ]);
        $data = new Department;
        $data->dept_name = $req->dept_name;
        $result = $data->save();
        if($result){
            return redirect('office/department')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function update_dept(Request $req)
    {
        $req->validate([
            'dept_name' => 'required'
        ]);
        $data = Department::find($req->id);
        $data->dept_name = $req->dept_name;
        $result = $data->save();
        if($result){
            return redirect('office/department')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function create_pos(Request $req)
    {
        $req->validate([
            'pos_name' => 'required'
        ]);
        $data = DB::table('positions')->insert([
            'position_name' => $req->pos_name,
            'created_at' => date('Y-m-d h:i:s')
        ]);;
       
       
        if($data){
            return redirect('office/department')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function update_pos(Request $req)
    {
        $req->validate([
            'pos_name' => 'required'
        ]);
        $data = DB::table('positions') 
                ->where('id', $req->id)
                ->update(['position_name' => $req->pos_name]);
       
        if($data){
            return redirect('office/department')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function delete_department($id){
        $data = Department::find($id);
        $data->delete();
        return redirect('office/department')->with('success','Delete Successfull!');
    }
    public function delete_position($id){
        
        $data = DB::table('positions') 
            ->where('id', $id)
            ->delete();
        return redirect('office/department')->with('success','Delete Successfull!');
    }
    public function branch()
    {
        $state = DB::table('states')->get();
        $data = Branch::orderBy('id','desc')->paginate(30);
        return view('admin.branch',['branch'=>$data,'state'=>$state]);
    }
    public function create_branch(Request $req)
    {
        $req->validate([
            'branch_name' => 'required',
            'address' => 'required',
            'township'=> 'required',
            'state' => 'required'
        ]);
        $data = new Branch;
        $data->state_id = $req->state;
        $data->branch_name = $req->branch_name;
        $data->address = $req->address;
        $data->township = $req->township;
        $result = $data->save();
        if($result){
            return redirect('office/branch')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function update_branch(Request $req)
    {
        $req->validate([
            'branch_name' => 'required'
        ]);
        $data = Branch::find($req->id);
        $data->state_id = $req->state;
        $data->branch_name = $req->branch_name;
        $data->address = $req->address;
        $data->township = $req->township;
        $result = $data->save();
        if($result){
            return redirect('office/branch')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function delete_branch($id){
        $data = Branch::find($id);
        $data->delete();
        return redirect('office/branch')->with('success','Delete Successfull!');
    }
    public function employee()
    {
        $position = DB::table('positions')->get();
        $state = DB::table('states')->get();
        $department = Department::all();
        $branch = Branch::all();
        return view('admin.create_emp',['state'=>$state,'position'=>$position,'department'=>$department,'branch'=>$branch]);
    }
    public function gettownship(Request $req)
    {
        //$data = Township::all();
        $data = Township::select('*')->where('state_id',$req->id)->get();
        return response()->json($data);
    }
    public function add_employee(Request $req)
    {
        $req->validate([
            'emp_name' => 'required',
            //'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'township' => 'required',
            'state' => 'required',
            'join_date' => 'required',
            'position' => 'required',
            'department' => 'required',
            'branch' => 'required'
        ]);
        $data = new Employee;
        $data->empname = $req->emp_name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->address=$req->address;
        $data->township = $req->township;
        $data->state_id = $req->state;
        $data->login_status = 0;
        $data->join_date = $req->join_date;
        $data->position = $req->position;
        $data->department = $req->department;
        $data->branch_id = $req->branch;
        $data->remark = $req->remark;
        $result = $data->save();
        if($result){
            return redirect('office/employee')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
    public function emplist(Request $req)
    {
        $data = Employee::orderBy('id', 'desc')->paginate(30);
        return view('admin.emplist',['employees'=>$data]);    
    }
    public function ajax_emplist(Request $req)
    {
        if($req->search_value!="")
        {
            //$data = Employee::select('*')->where('empname',$req->search_value)->get();
            $data = Employee::select('*')->where('empname','LIKE','%'.$req->search_value.'%')->orWhere('department','LIKE','%'.$req->search_value.'%')->get();
            return response()->json($data);
        }
       
    }
    public function delete_emp($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect('office/emplist')->with('success','Delete Successfull!');
    }
    public function emp_edit($id)
    {
        $position = DB::table('positions')->get();
        $state = DB::table('states')->get();
        $department = Department::all();
        $branch = Branch::all();
        $emp = Employee::find($id);
        return view('admin.emp_edit',['state'=>$state,'position'=>$position,'department'=>$department,'branch'=>$branch,'employees'=>$emp]);
    }
    public function emp_detail($id)
    {
        $emp = Employee::find($id);
        return view('admin.emp_detail',['employee'=>$emp]);    
    }
    public function update_employee(Request $req)
    {
        $req->validate([
            'emp_name' => 'required',
            //'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'township' => 'required',
            'state' => 'required',
            'join_date' => 'required',
            'position' => 'required',
            'department' => 'required',
            'branch' => 'required'
        ]);
        $data = Employee::find($req->id);
        $data->empname = $req->emp_name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->address=$req->address;
        $data->township = $req->township;
        $data->state_id = $req->state;
        $data->login_status = 0;
        $data->join_date = $req->join_date;
        $data->position = $req->position;
        $data->department = $req->department;
        $data->branch_id = $req->branch;
        $data->remark = $req->remark;
        $result = $data->save();
        if($result){
            return redirect('office/emplist')->with('success','Save successluly');
        }else{
            return back()->with('fail','Something wrong');
        }
    }
}
