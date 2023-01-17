<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Auth;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function role(Request $request)
    {

        if (Auth::user()->role_id == 1) {
            $role = Role::all();

            return view('role.list')->withrole($role);
        } else {
                 return redirect()->route('accessdenied')->with('error', 'Access Denied.');
        }

    }

    public function index(Request $request, $id)
    {

        if (Auth::user()->role_id == 1) {

            $permissiondata = Permission::where('role_id', $id)->first();

            $rolename = Role::find($id);

            $permisstion = array();
            if (!empty($permissiondata)) {
                $permisstion = json_decode($permissiondata->permissiondata);
            }
            return view('permission.create')->withpermissiondata($permissiondata)->withpermisstion($permisstion)->withrole($id)->withrolename($rolename);

        } else {
            return redirect()->route('accessdenied')->with('error', 'Access Denied.');
        }

    }

    public function permissionadd(Request $request)
    {

        if (Auth::user()->role_id == 1) {

            $Permissiondata = Permission::where('role_id', $request->role)->get();
            $roledata = json_encode($request->data);
            $ID = Auth::guard()->user()->id;


        if (count($Permissiondata) == 0) {
            Permission::create([
                'role_id' => $request->role,
                'permissiondata' => $roledata,
                'createdby' => $ID,
            ]);

            return redirect()->route('role')->with('message', 'Permission Created Successfully.');
        } else {
            Permission::where('role_id', $request->role)
                ->update([
                    'role_id' => $request->role,
                    'permissiondata' => $roledata,
                    'modifiedby' => $ID,
                ]);

            return redirect()->route('role')->with('message', 'Permission Updated Successfully.');
        }

        } else {
             return redirect()->route('accessdenied')->with('error', 'Access Denied.');
        }


    }

    public function accessdenied(Request $request)
    {
        return view('errors.404');
    }

}
