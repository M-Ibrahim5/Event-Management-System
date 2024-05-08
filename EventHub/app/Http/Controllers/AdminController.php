<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use App\Models\Payment;
use App\Models\Admin;
use App\Models\Sponsorships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**************************Events*******************************/
    public function eventindex(Request $request)
    {
        // Get the search term from the request
        $search = $request->input('search');

        // Query events based on the search term
        $query = Events::orderBy('id', 'asc');

        if ($search) {
            $query->where('eventCategory', 'like', "%$search%")
                ->orWhere('eventName', 'like', "%$search%")
                ->orWhere('eventLocation', 'like', "%$search%");
        }

        // Get the filtered data
        $data = $query->get();

        // Pass the filtered data and search term to the view
        return view('admin/manageEvent', compact('data', 'search'));
    }

    public function createevent()
    {
        $sponsorships = Sponsorships::all();
        return view('admin/addEvent', compact('sponsorships'));
    }

    public function storeevent(Request $request)
    {
        /* $eventName = $request->input('eventName');

        // Check if a new image file is provided
        if ($request->hasFile('imagePath')) {
            $imagePath = $request->file('imagePath')->storeAs('img', $eventName . '.jpg', 'public');
            // 'img' is a relative path within the 'public' disk
        } else {
            $imagePath = null;
        }
        $imagePath2 = $imagePath;
        Events::create([
            'eventName' => $request->name,
            'eventDescription' => $request->description,
            'eventLocation' => $request->location,
            'eventCategory' => $request->category,
            'eventStartDate' => $request->startdate,
            'eventEndDate' => $request->enddate,
            'eventStartTime' => $request->starttime,
            'eventEndTime' => $request->endtime,
            'eventPrice' => $request->price,
            'eventCapacity' => $request->capacity,
            'email' => 'EventHub@gmail.com',
            'eventStatus' => 'Confirmed',
            'imagePath' => $imagePath2,
            'sponsor' => $request->sponsor,
            'sponsorStatus' => 'Confirmed',
            'created_at' => now(),
            'updated_at' => now(),
        ]); */
        $eventName = $request->input('eventName');

        if ($request->hasFile('imagePath')) {
            $imagePath = $request->file('imagePath')->storeAs('img', $eventName . '.jpg', 'public');
            // 'img' is a relative path within the 'public' disk
        } else {
            $imagePath = null;
        }

        $requestData = $request->all();
        $requestData['imagePath'] = $imagePath;        

        Events::create($requestData);

        return redirect()->back()->with('status', 'Event Added Successfully');
    }

    public function editevent($id)
    {
        $event = Events::find($id);

        return view('admin/editevent', compact('event'));
    }

    public function updateevent(Request $request, $id)
    {
        /* $event = Events::find($id);

        $event->eventName = $request->input('name');
        $event->eventDescription = $request->input('description');
        $event->eventLocation = $request->input('location');
        $event->eventCategory = $request->input('category');
        $event->eventStartDate = $request->input('startdate');
        $event->eventEndDate = $request->input('enddate');
        $event->eventStartTime = $request->input('starttime');
        $event->eventEndTime = $request->input('endtime');
        $event->eventPrice = $request->input('price');
        $event->eventCapacity = $request->input('capacity');
        $event->eventStatus = $request->input('status');
        $event->sponsor = $request->input('sponsor');
        $event->sponsorStatus = $request->input('sponsorStatus');
        // Check if a new image file is provided
        if ($request->hasFile('eventImage')) {
            $imagePath = $request->file('eventImage')->storeAs('public/img', 'custom_filename.jpg');
            // Customize the storage path and filename based on your needs
        } else {
            // No new image file provided, keep the existing image path
            $imagePath = $event->imagePath;
        }
        $event->imagePath = $imagePath;
        $event->update(); */
        $data = Events::find($id);

        // Check if a new image file is provided
        if ($request->hasFile('eventImage')) {
            $imagePath = $request->file('eventImage')->storeAs('public/img', 'custom_filename.jpg');
            // Customize the storage path and filename based on your needs
        } else {
            // No new image file provided, keep the existing image path
            $imagePath = $data->imagePath;
        }
    
        $requestData = $request->all();
        $requestData['imagePath'] = $imagePath;
        $requestData['email'] = $data->email;
    
        // Update the event with the new data
        $data->update($requestData);

        return redirect()->back()->with('status', 'Event Updated Successfully');
    }

    public function destroyevent($id)
    {
        $del = Events::find($id);

        $del->delete();
        return redirect()->back()->with('status', 'Event Deleted Successfully');
    }

    public function dashboard()
    {
        $count = Events::where('eventStatus', '=', 'Pending')->count();

        return view('admin/dashboard')->with('count', $count);
    }

    //Get all event requests
    public function requests(Request $request)
    {
        $search = $request->input('search');

        $query = Events::where('eventStatus', 'Pending')->orderBy('id', 'asc');

        if ($search) {
            $query->where('eventCategory', 'like', "%$search%")
                ->orWhere('eventName', 'like', "%$search%")
                ->orWhere('eventLocation', 'like', "%$search%");
        }

        $data = $query->get();
        return view('admin/eventRequests', compact('data', 'search'));
    }

    public function details($id)
    {
        $events = Events::find($id);

        return view('admin/eventDetails', compact('events'));
    }

    public function updateStatus(Request $request, $id, $action)
    {
        $events = Events::find($id);

        if (!$events) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        // Use the $action variable to determine the status
        $status = $action === 'accepted' ? 'Accepted' : 'Rejected';

        $events->eventStatus = $status;
        $events->save();

        return redirect()->back()->with('status', 'Event status updated successfully');
    }

    public function report($id)
    {
        $events = Events::find($id);

        $totalTicketsSold = Payment::where('event_id', $id)
            ->sum('ticket_quantity');

        $totalAmountSold = Payment::where('event_id', $id)
            ->sum('amount');

        //dd($totalTicketsSold . ' ' . $totalAmountSold . ' ' . $events);
        return view('admin.report', compact('events', 'totalTicketsSold', 'totalAmountSold'));
    }

    /**********************Users*****************************/
    public function userIndex(Request $request)
    {
        $search = $request->input('search');

        // Query events based on the search term
        $query = User::orderBy('id', 'asc');

        if ($search) {
            $query->where('f_name', 'like', "%$search%")
                ->orWhere('l_name', 'like', "%$search%");
        }

        // Get the filtered data
        $data = $query->get();

        // Pass the filtered data and search term to the view
        return view('admin/viewAccounts', compact('data', 'search'));
    }

    public function createuser()
    {
        return view('admin/addUser');
    }

    public function storeuser(Request $request)
    {
        User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            // 'is_organizer' => 
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('status', 'User Added Successfully');
    }

    public function destroyuser($id)
    {
        $del = User::find($id);

        $del->delete();
        return redirect()->back()->with('status', 'User Deleted Successfully');
    }

    /*******************Sponsors***************/
    public function sponsorIndex(Request $request)
    {
        $search = $request->input('search');

        // Query events based on the search term
        $query = Sponsorships::orderBy('id', 'asc');
        if ($search) {
            $query->where('sponsorName', 'like', "%$search%")
                ->orWhere('sponsorDescription', 'like', "%$search%")
                ->orWhere('sponsorAmount', 'like', "%$search%");
        }

        $data = $query->get();

        return view('admin/viewSponsors', compact('data', 'search'));
    }

    public function createsponsor()
    {
        return view('admin/addSponsor');
    }

    public function storesponsor(Request $request)
    {
        Sponsorships::create([
            'sponsorName' => $request->name,
            'sponsorDescription' => $request->description,
            'sponsorAmount' => $request->amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('status', 'Sponsor Added Successfully');
    }

    public function editsponsor($id)
    {
        $sponsor = Sponsorships::find($id);

        return view('admin/editsponsor', compact('sponsor'));
    }

    public function updatesponsor(Request $request, $id)
    {
        $sponsor = Sponsorships::find($id);

        $sponsor->sponsorName = $request->input('name');
        $sponsor->sponsorDescription = $request->input('description');
        $sponsor->sponsorAmount = $request->input('amount');

        $sponsor->update();
        return redirect()->back()->with('status', 'Event Updated Successfully');
    }

    public function destroysponsor($id)
    {
        $del = Sponsorships::find($id);

        $del->delete();
        return redirect()->back()->with('status', 'Sponsor Deleted Successfully');
    }


    public function sponsor2(Request $request)
    {
        $search = $request->input('search');

        $query = Events::where('sponsorStatus', 'Pending')
            ->orWhereNull('sponsorStatus')
            ->orderBy('id', 'asc');

        if ($search) {
            $query->where('eventCategory', 'like', "%$search%")
                ->orWhere('eventName', 'like', "%$search%")
                ->orWhere('eventLocation', 'like', "%$search%");
        }

        $data = $query->get();
        return view('admin/sponsorRequests', compact('data', 'search'));
    }

    public function updateSponsorStatus(Request $request, $id, $action)
    {
        $events = Events::find($id);

        if (!$events) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        // Use the $action variable to determine the status
        $status = $action === 'accepted' ? 'Accepted' : 'Rejected';

        $events->sponsorStatus = $status;
        $events->save();

        return redirect()->back()->with('status', 'Event status updated successfully');
    }
}
