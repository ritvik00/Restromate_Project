<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class FaqController extends Controller
{
    public function index()
    {
        $faq = Faq::all();
        return view("faq.list")->withfaq($faq);
    }

    public function create()
    {
        return view("faq.create");
    }

    public function edit($id){

        $editgroup = Faq::find($id);
        return view('faq.create')->withfaq($editgroup);

    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required|max:255',
        ],
        [
            'question.required'=>'This field is required.',
            'question.max'=>'Your question is too long, please enter maximum 255 character.',
            'answer.required'=>'This field is required.',
            'answer.max'=>'Your answer is too long, please enter maximum 255 character.',
        ]);
        if ($request->id == null) 
        {

        $data = $request->all();


        $articledata = Faq::create([
            'question'           => $data['question'],
            'answer'           => $data['answer'],
        ]);
        return redirect()->route('faq')->with('message', 'Faq Created Successfully.');
        }else
        {
            $faq = DB::table("faq")
                ->where("id", $request->id)
                ->update([
                    'question' => $request->question,
                    'answer' => $request->answer
                    
                ]);
                return redirect()->route('faq')->with('message', 'Faq Updated Successfully.');
        }

    }

    public function delete($id){

        $slider = Faq::find($id);
        $slider->delete();
        return redirect()->route('faq')->with('message', 'Faq Deleted Successfully.');

    }

}
