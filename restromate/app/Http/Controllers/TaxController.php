<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class TaxController extends Controller
{
    public function index()
    {
        $offer = Tax::all();
        return view('tax.list')->withoffer($offer);
    }

    public function create()
    {
        return view("tax.create");
    }

    public function active($id,$active)
    {
      

        $user = Tax::find($id);

        if (empty($user)) {
            return redirect()->route('tax')->with('message', 'Tax Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('tax')->with('message', 'Tax Status Updated Successfully. ');

    }


    public function delete($id){

        $offer = Tax::find($id);
        $offer->delete();
        return redirect()->route('tax')->with('message', 'Tax Deleted Successfully.');

    }

    public function edit($id){

        $offer = Tax::find($id);
        return view('tax.create')->withoffer($offer);

    }

    public function store(Request $request)
    {
        // dd($request->all());
            $request->validate([
            'name' => 'required',
            'percentage' => 'required',

        ],
        [
            'name.required'=>'This field is required.',
            'percentage.required'=>'This field is required.',
        ]);
        
        $id = Auth::user()->id;
        if ($request->id == null) 
        {

        $data = $request->all();


        $articledata = Tax::create([
            'name'           => $data['name'],
            'percentage'   => $data['percentage'],
            'user_id'        => $id,
        ]);

        return redirect()->route('tax')->with('message', 'Tax Created Successfully.');
        }

        else
        {
        
            $offer = DB::table("tax")
                ->where("id", $request->id)
                ->update([
                    'name' => $request->name,
                    'percentage' => $request->percentage,
                    'user_id' => $id,
                   
                ]);
                return redirect()->route('tax')->with('message', 'Tax Updated Successfully.');

        }

    }
}
