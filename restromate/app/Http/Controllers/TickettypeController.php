<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class TicketController extends Controller
{
    public function index()
    {
        $ticket=Ticket::all();
        return view("ticket.list")->withticket($ticket);
    }

    public function create()
    {
        return view("ticket.create");
    }


    public function edit($id){

        $editgroup = Ticket::find($id);
        return view('ticket.create')->withtickets($editgroup);

    }


    public function store(Request $request)
    {
        $request->validate([
            'ticket_name' => 'required',
        ],
        [
            'ticket_name.required'=>'This field is required.'
        ]);
        if ($request->id == null) 
        {

        $data = $request->all();


        $articledata = Ticket::create([
            'ticket_name'           => $data['ticket_name'],
        ]);
        return redirect()->route('ticket')->with('message', 'Ticket Created Successfully.');
        }else
        {
            $slider = DB::table("ticket")
                ->where("id", $request->id)
                ->update([
                    'ticket_name' => $request->ticket_name
                    
                ]);
                return redirect()->route('ticket')->with('message', 'Ticket Updated Successfully.');
        }

    }

    public function delete($id){

        $slider = Ticket::find($id);
        $slider->delete();
        return redirect()->route('ticket')->with('message', 'Ticket Deleted Successfully.');

    }

}
