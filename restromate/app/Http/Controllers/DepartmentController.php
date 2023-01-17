<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{


    public function index()
    {
        $department = department::leftjoin('users','departments.companyid','users.id')
                                 ->select('departments.*','users.user_name as companyid')
                                 ->get();

        return view('department.list')->withdepartment($department);
    }



    public function create()
    {

      $company =   User::where('role_id',2)->where('is_active', 1)->get();

        return view('department.create')->withcompany($company);
    }


    public function store(Request $request)
    {
       

        $request->validate([
            'department_name'=>'required|unique:departments',
            ],
            [
                'department_name.required'=>'This field is required.',
                'department_name.unique'=>'The department name name has already been taken.',
                
            ]);

            $ID= Auth::guard()->user()->id;

            $data = $request->all();

            $articledata = department::create([
                'department_name'       => $data['department_name'],
                'companyid'             => $data['companyid'],
                'createdby'             => $ID,
                'is_active'             => $data['is_active']
            ]);

   
            return redirect()->route('department')->with('message', 'company create  Successfully .. please check you mail ... ');
    }


    public function edit($id)
    {
            $department = department::find($id);

            $company =   User::where('role_id',2)->where('is_active', 1)->get();

        return view('department.update')->withdepartment($department)->withcompany($company);;
    }



    public function update(Request $request)
    {

        $request->validate([
            'department_name'=>'required|unique:departments,department_name,'.$request->id,
            ],
            [
                'department_name.required'=>'This field is required.',
                'department_name.unique'=>'The department name name has already been taken.',
                
            ]);


            $ID= Auth::guard()->user()->id;

            $data = $request->all();

            
            
            $data = $request->all();
            
            
            $data = $request->all();
            $user = department::find($request->id);
            $user->update([
                'department_name'       => $data['department_name'],
                'companyid'             => $data['companyid'],
                'is_active'             => $data['is_active'],
                'modifiedby'             => $ID,
                'updated_at'           => date("Y-m-d h:i:s")
            ]);


        return redirect()->route('department')->with('message', 'company update Successfully ');

    }


    public function delete($id)
    {

        $id = $id;
        $departments = Department::find($id);

        if (empty($departments)) {
            return redirect()->route('department')->with('message', 'company id not found ');
        }
        $departments->delete();
        return redirect()->route('department')->with('message', 'company deleted Successfully ');


    }







    

    



    
}