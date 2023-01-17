<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Tickettype;
use App\Models\User;
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
        $ticket=Tickettype::all();
        return view("ticket.list")->withticket($ticket);


        // $ticket = Tickettype::leftjoin('tickettype','ticket.ticket_name','tickettype.id')
        // ->select('products.*','category.ticket_name as ticket_name')
        // ->get();

        // return view("ticket.list")->withticket($ticket);

    }

    public function create()
    {
        return view("ticket.create");
    }


    public function edit($id){

        $editgroup = Tickettype::find($id);
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


        $articledata = Tickettype::create([
            'ticket_name'           => $data['ticket_name'],
        ]);
        return redirect()->route('ticket')->with('message', 'Ticket Created Successfully.');
        }else
        {
            $slider = DB::table("tickettype")
                ->where("id", $request->id)
                ->update([
                    'ticket_name' => $request->ticket_name
                    
                ]);
                return redirect()->route('ticket')->with('message', 'Ticket Updated  Successfully.');
        }

        }

    public function delete($id){

        $slider = Tickettype::find($id);
        $slider->delete();
        return redirect()->route('ticket')->with('message', 'Ticket Deleted Successfully.');

    }

    public function system()
    {
        // $ticket=Ticket::all();
        // return view("ticket.system")->withticket($ticket);

        $ticket = Ticket::leftjoin('users','ticket.user_id','users.id')
                        ->leftjoin('tickettype','ticket.ticket_name','tickettype.id')
        ->select('ticket.*','users.user_name as user_id', 'tickettype.ticket_name as ticket_name',)
        ->get();
        
        return view('ticket.system')->withticket($ticket);
    }

    public function cod($id,$active)
    {
      

        $user = Ticket::find($id);

        if (empty($user)) {
            return redirect()->route('ticket.system')->with('message', 'Ticket Id Not Found. ');
        }

        $user->update([
            'status'  => $active
        ]);


        return redirect()->route('ticket.system')->with('message', 'Ticket Status Updated Successfully.');

    }

    public function ticketdelete($id){   

        $slider = Ticket::find($id);
        $slider->delete();
        return redirect()->route('ticket.system')->with('message', 'Ticket Deleted Successfully.');

    }

    public function ticketcreate()
    {
       $tic =  Tickettype::all();
       return view('ticket.ticketcreate')->withtic($tic);
    }

    public function ticketstore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'ticket_name' => 'required',
            'user_id'=>'required',
            'subject'=>'required',
            'email'=>'required',
            'description'=>'required',
        ],
        [
            'ticket_name.required'=>'This field is required.',
            'user_id.required'=>'This field is required.',
            'subject.required'=>'This field is required.',
            'email.required'=>'This field is required.',
            'description.required'=>'This field is required.',
        ]);

        $data = $request->all();

        if ($request->id == null) 
        {
            // dd($data);
        $articledata = Ticket::create([
            'ticket_name'           => $data['ticket_name'],
            'user_id'           => $data['user_id'],
            'subject'           => $data['subject'],
            'email'           => $data['email'],
            'description'           => $data['description'],
        ]);
        return redirect()->route('ticket.system')->with('message', 'Ticket Created Successfully.');
        }else
        {
            $slider = DB::table("ticket")
                ->where("id", $request->id)
                ->update([
                    'ticket_name'           => $data['ticket_name'],
                    'user_id'           => $data['user_id'],
                    'subject'           => $data['subject'],
                    'email'           => $data['email'],
                    'description'           => $data['description'],
                    
                ]);
                return redirect()->route('ticket.system')->with('message', 'Ticket Updated Successfully.');
        }

    }
    public function ticketedit($id)
    {
        $tickets = Ticket::find($id);
        $tic =  Tickettype::all();
        return view('ticket.ticketcreate')->withtic($tic)->withtickets($tickets);
    }

}
