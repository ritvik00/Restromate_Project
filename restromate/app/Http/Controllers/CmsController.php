<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class CmsController extends Controller
{
    public function index()
    {
        $data = Cms::all();
        return view('cms.list')->withdata($data);
    }

    public function create()
    {
        return view('cms.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'This field is required.',
                'content.required' => 'This field is required.',
            ],
        );

        // $is_active = $request->verified;

        if ($request->id == null) {
            $data = $request->all();

            $articledata = Cms::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'meta_title' => $data['meta_title'],
                'meta_dec' => $data['meta_dec'],
                'meta_key' => $data['meta_key'],
            ]);

            return redirect()
                ->route('cms')
                ->with('message', 'Cms Created Successfully.');
        } else {
            Cms::where('id', $request->id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'meta_title' => $request->meta_title,
                'meta_dec' => $request->meta_dec,
                'meta_key' => $request->meta_key,
            ]);

            return redirect()
                ->route('cms')
                ->with('message', 'Cms Updated Successfully.');
        }

        return redirect()
            ->route('cms')
            ->with('message', 'Cms Created Successfully.');
    }

    public function edit($id)
    {
        $editgroup = Cms::find($id);
        return view('cms.create')->withedit($editgroup);
    }

    public function delete($id)
    {
        $editgroup = DB::table('cms')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('cms')
            ->with('message', 'Cms Deleted Successfully.');
    }
    
    public function active($id, $active)
    {
        $user = Cms::find($id);

        if (empty($user)) {
            return redirect()
                ->route('cms')
                ->with('message', 'Cms Id Not Found. ');
        }

        $user->update([
            'verified' => $active,
        ]);

        return redirect()
            ->route('cms')
            ->with('message', 'Cms Status Updated Successfully. ');
    }
}
