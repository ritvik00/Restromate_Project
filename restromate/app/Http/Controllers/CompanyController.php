<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\DemoMail;

class CompanyController extends Controller
{

    public function index()
    {
        $users = User::where('users.role_id', 2)->get();
        return view('company.list')->withusers($users);
    }



    public function create()
    {
        return view('company.create');
    }


    public function store(Request $request)
    {
       

        $request->validate([
            'user_name'=>'required|unique:users',
             'email' => 'required|unique:users',
             'phoneno' => 'required|numeric|digits:10'
            ],
            [
                'user_name.required'=>'This field is required.',
                'user_name.unique'=>'The company name has already been taken.',
                'email.required'=>'This field is required.',
                'email.unique'=>'The company email has already been taken.',
                'phoneno.required' =>'This field is required.'
                
            ]);

            $ID= Auth::guard()->user()->id;

            $data = $request->all();

            $articledata = User::create([
                'user_name'            => $data['user_name'],
                'email'                => $data['email'],
                'password'             =>Hash::make('12345678'),
                'phoneno'              => $data['phoneno'],
                'address'              => $data['address'],
                'full_name'            => $data['user_name'],
                'role_id'              => 2,
                'createdby'             => $ID,
            ]);


            // $mailData = [
            //     'title' => 'Mail from ItSolutionStuff.com',
            //     'body' => 'This is for testing email using smtp.'
            // ];
             
            // Mail::to('demotesting0909@gmail.com')->send(new DemoMail($mailData));
               
    

            return redirect()->route('compnay')->with('message', 'Company Created Successfully.');
    }


    public function edit($id)
    {
            $users = User::find($id);
        return view('company.update')->withusers($users);
    }



    public function update(Request $request)
    {

        $request->validate([
            'user_name'=>'required|unique:users,user_name,'.$request->id,
             'email' => 'required|unique:users,email,'.$request->id,
             'phoneno' => 'required|numeric|digits:10'
            ],
            [
                'user_name.required'=>'This field is required.',
                'user_name.unique'=>'The company name has already been taken.',
                'email.required'=>'This field is required.',
                'email.unique'=>'The company email has already been taken.',
                'phoneno.required' =>'This field is required.'
                
            ]);


            $ID= Auth::guard()->user()->id;


            $data = $request->all();


            $data = $request->all();
            $user = User::find($request->id);
            $user->update([
                'user_name'            => $data['user_name'],
                'phoneno'              => $data['phoneno'],
                'address'              => $data['address'],
                'full_name'            => $data['user_name'],
                'role_id'              => 3,
                'modifiedby'             => $ID,
                'updated_at'           => date("Y-m-d h:i:s")
            ]);


        return redirect()->route('compnay')->with('message', 'Company Updated Successfully. ');

    }


    public function delete($id)
    {


        $id = $id;
        $users = User::find($id);


        
        if (empty($users)) {
            return redirect()->route('compnay')->with('message', 'Company Id Not Found. ');
        }


        $users->delete();

        return redirect()->route('compnay')->with('message', 'Company Deleted Successfully. ');


    }


    
    public function active($id,$active)
    {

        $user = User::find($id);

        if (empty($user)) {
            return redirect()->route('compnay')->with('message', 'Company Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);

        return redirect()->route('compnay')->with('message', 'Company Verified Status Successfully. ');

    }




    

    



    
}