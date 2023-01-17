<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function in(){
       
        return view('employee.user');
    }

    function getData(Request $req)
    {
     $validatedData = $req->validate([
          'UserName' => 'required|unique:employees',
           'email' => 'required|unique:employees|max:255',
         //  'age' => 'required',
         //  'contact_no' => 'required|unique:employees|max:255',
        ]);
 
    // dd($req->all());
    $User= new User;
    $User ->user_name=$req->user_name;
    $User ->password=$req->password;
    $User ->full_name=$req->full_name;
    $User ->address=$req->address;
    $User ->phoneno=$req->phoneno;
    $User ->email=$req->email;
    $User ->lastlogin=$req->lastlogin;
    $User ->is_active=$req->is_active;
    $User ->createdby=$req->createdby;
    $User ->modifiedby=$req->modifiedby;
    $User ->role_id=$req->role_id;

    $User->save();
    return back()->with("success","Record inserted!!!");
    return redirect('show');
    //dd($req->all());
    }

    public function show(User  $User)
   {
        $User=User::leftjoin('roles','users.role_id','roles.id')
                    ->select('users.*','roles.role_name as role_id')
                    ->get();    
        return view('employee.show',['User'=>$User]);
   }
   public function destroy(User  $User,$id)
   {
        $User=User::find($id);
        $User->delete();
        return redirect('show');
   }

   public function edit(User  $User,$id)
   {
        $User=User::find($id);
        return view('edit',['User'=>$User]);
//$student->delete();
        return redirect('show');
   }
   public function update(Request $req,User  $User,$id)
   {
           $User=User::find($id);
            $User ->user_name=$req->get('user_name');
            $User ->password=$req->get('password');
            $User ->full_name=$req->get('full_name');
            $User ->address=$req->get('address');
            $User ->phoneno=$req->get('phoneno');
            $User ->email=$req->get('email');
            $User ->lastlogin=$req->get('lastlogin');
            $User ->is_active=$req->get('is_active');
            $User ->createdby=$req->get('createdby');
            $User ->modifiedby=$req->get('modifiedby');
            $User ->role_id=$req->get('role_id');

        $User->save();
      return redirect('show');
      return back()->with("success","Record updated!!!"); 
   }




   
}








