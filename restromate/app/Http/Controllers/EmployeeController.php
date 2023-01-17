<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\department;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
            $employee = Employee::leftjoin('departments','employees.department_id','departments.id')
                                  ->leftjoin('users','employees.companyid','users.id')
                                  ->select('employees.*','departments.department_name as department_id', 'users.user_name as companyid' )
                                  ->get();


        return view('employee.list')->withemployee($employee);
    }
    public function create()
    {

       $dep =  department::all();
       $compnay = User::where('users.role_id', 2)->get();
       return view('employee.create')->withdep($dep)->withcompnay($compnay);
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
             'email' => 'required|unique:employees',
             'password' => 'required|min:8',
             'phone_no' => 'required|numeric|digits:10',
             'date_of_brith'=>'required',
             'department_id'=>'required',
             'salary'=>'required|numeric',
             'start_date'=>'required',
             'last_day_of_work'=>'required',
             'companyid'=>'required',
             'hourly_rate'=>'numeric'
            ],
            [
                'first_name.required'=>'This field is required.',
                'last_name.required'=>'This field is required.',
                'date_of_brith.required'=>'This field is required.',
                'department_id.required'=>'This field is required.',
                'salary.required'=>'This field is required.',
                'start_date.required'=>'This field is required.',
                'last_day_of_work.required'=>'This field is required.',
                'first_name.unique'=>'The company name has already been taken.',
                'email_id.required'=>'This field is required.',
                'email_id.unique'=>'The company email has already been taken.',
                'phone_no.required' =>'This field is required.',
                'companyid.required' =>'This field is required.'
            ]);
            $ID= Auth::guard()->user()->id;


            $data = $request->all();
            $photo = null;


            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/employee');
                $image->move($destinationPath, $name);
                $photo = $name;
            }


            $articledata = Employee::create([
                'first_name'           => $data['first_name'],
                'last_name'            => $data['last_name'],
                'password'             => Hash::make($data['password']),
                'address'              => $data['address'],
                'phone_no'             => $data['phone_no'],
                'email'                => $data['email'],
                'department_id'        => $data['department_id'],
                'date_of_brith'        => $data['date_of_brith'],
                'home'                 => $data['home'],
                'home_no'              => $data['home_no'],
                'work_phone'           => $data['work_phone'],
                'hourly_rate'          => $data['hourly_rate'],
                'salary'               => $data['salary'],
                'start_date'           => $data['start_date'],
                'last_day_of_work'     => $data['last_day_of_work'],
                'companyid'            => $data['companyid'],
                'Photo'                => $photo,
                'role_id'              => 3,
                'createdby'            => $ID
            ]);

            return redirect()->route('employee')->with('message', 'Employee create Successfully.');
    }
    public function edit($id)
    {
            $employee = Employee::find($id);
            $dep =  department::all();
            $compnay = User::where('users.role_id', 2)->get();
             return view('employee.update')->withdep($dep)->withcompnay($compnay)->withemployee($employee);


    }



    public function update(Request $request)
    {


        
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
             'email' => 'required|unique:employees,email,'.$request->id,
            //  'password' => 'required|min:8',
             'phone_no' => 'required|numeric|digits:10',
             'date_of_brith'=>'required',
             'department_id'=>'required',
             'salary'=>'required|numeric',
             'start_date'=>'required',
             'last_day_of_work'=>'required',
             'companyid'=>'required',
             'hourly_rate'=>'numeric'
            ],
            [
                'first_name.required'=>'This field is required.',
                'last_name.required'=>'This field is required.',
                'email.required'=>'This field is required.',
                'email.unique'=>'The company email has already been taken.',
                'phone_no.required' =>'This field is required.',
                'date_of_brith.required'=>'This field is required.',
                'department_id.required'=>'This field is required.',
                'salary.required'=>'This field is required.',
                'start_date.required'=>'This field is required.',
                'last_day_of_work.required'=>'This field is required.',
                'first_name.unique'=>'The company name has already been taken.',
                'companyid.required' =>'This field is required.'
            ]);


     
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/employee');
                $image->move($destinationPath, $name);
                $photo = $name;
            }
            else{
                $photo = $request->showphotos;
            }


           


            $ID= Auth::guard()->user()->id;
            $data = $request->all();
            $user = Employee::find($request->id);
            $user->update([
                'first_name'           => $data['first_name'],
                'last_name'            => $data['last_name'],
                'address'              => $data['address'],
                'phone_no'             => $data['phone_no'],
                'email'                => $data['email'],
                'department_id'        => $data['department_id'],
                'date_of_brith'        => $data['date_of_brith'],
                'home'                 => $data['home'],
                'home_no'              => $data['home_no'],
                'work_phone'           => $data['work_phone'],
                'hourly_rate'          => $data['hourly_rate'],
                'salary'               => $data['salary'],
                'start_date'           => $data['start_date'],
                'last_day_of_work'     => $data['last_day_of_work'],
                'companyid'            => $data['companyid'],
                'Photo'                => $photo,
                'role_id'              => 3,
                'modifiedby'             => $ID,
                'updated_at'           => date("Y-m-d h:i:s")
            ]);


        return redirect()->route('employee')->with('message', 'Employee Updated Successfully. ');

    }


    public function delete($id)
    {


        $id = $id;
        $employee = Employee::find($id);


        
        if (empty($employee)) {
            return redirect()->route('employee')->with('message', 'Employee Id Not Found. ');
        }


        $employee->delete();

        return redirect()->route('employee')->with('message', 'Employee Deleted Successfully. ');


    }

}



