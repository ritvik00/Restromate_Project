<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class TagController extends Controller
{
    public function index()
    {
        $offer = Tag::all();
        return view('tag.list')->withoffer($offer);
    }

    public function create()
    {
        return view("tag.create");
    }

    public function active($id,$active)
    {
      

        $user = Tag::find($id);

        if (empty($user)) {
            return redirect()->route('tag')->with('message', 'Tag Id Not Found.');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('tag')->with('message', 'Tag Status Updated Successfully.');

    }


    public function delete($id){

        $offer = Tag::find($id);
        $offer->delete();
        return redirect()->route('tag')->with('message', 'Tag Deleted Successfully.');

    }

    public function edit($id){

        $offer = Tag::find($id);
        return view('tag.create')->withoffer($offer);

    }

    public function store(Request $request)
    {
        // dd($request->all());


            $request->validate([
            'name' => 'required|unique:tag',
        ],
        [
            'name.required'=>'This field is required.',
            'name.unique'=>'The Tag has already been Taken.',
        ]);
        
        $id = Auth::user()->id;
        if ($request->id == null) 
        {

        $data = $request->all();


        $articledata = Tag::create([
            'name'           => $data['name'],
            'user_id'        => $id,
        ]);

        return redirect()->route('tag')->with('message', 'Tag Created Successfully.');
        }

        else
        {
            $offer = DB::table("tag")
                ->where("id", $request->id)
                ->update([
                    'name' => $request->name,
                    'user_id' => $id,
                   
                ]);
                return redirect()->route('tag')->with('message', 'Tag Updated Successfully.');
        }

    }
}
