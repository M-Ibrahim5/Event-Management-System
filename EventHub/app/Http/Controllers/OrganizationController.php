<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;
use App\Models\Sponsorships;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    // Home
    public function organization()
    {
        return view('/org/organization');
    }

    // Events
    public function showEvent(Events $events)
    {
        $userEmail = Auth::user()->email;
        //dd($userEmail);
        $events = Events::where('email', $userEmail)->get();
        //dd($events);
        return view('org.manageEvent', compact('events'));
    }

    public function createEventForm()
    {
        $sponsorships = Sponsorships::all();
        $userEmail = Auth::user()->email;
        return view('/org/createEvent', compact('userEmail', 'sponsorships'));
    }

    public function createEvent(Request $request)
{
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

    return redirect()->route('organization.showEvent')->with('success', 'The event has been successfully created');
}

    
    public function deleteEvent($id){
        $data = Events::find($id);
        $data->delete();

        return redirect()->route('organization.showEvent')->with('success', 'The event has been successfully deleted');

    }

    public function getEvent($id)
    {
        $data = Events::find($id);
        $sponsorships = Sponsorships::all();

        //dd($data);
        return view('/org/editEvent',  compact('data','sponsorships'));
    }

    public function updateEvent(Request $request, $id)
{
    $data = Events::find($id);

    // Check if a new image file is provided
    if ($request->hasFile('eventImage')) {
        $imagePath = $request->file('eventImage')->storeAs('public/img', 'custom_filename.jpg');
        // Customize the storage path and filename based on your needs
    } else {
        // No new image file provided, keep the existing image path
        $imagePath = $data->imagePath;
    }

    $userEmail = Auth::user()->email;
    $requestData = $request->all();
    $requestData['imagePath'] = $imagePath;
    $requestData['email'] = $userEmail;

    // Update the event with the new data
    $data->update($requestData);

    return redirect()->route('organization.showEvent')->with('success', 'The event has been successfully updated');
}

    //Report
    public function showReport($id)
    {
        $userEmail = Auth::user()->email;
        $data = Events::find($id);
        $order = Payment::where('event_id', $id);
        $totalTicketsSold = Payment::where('event_id', $id)
        ->sum('ticket_quantity');
        $totalAmountSold = Payment::where('event_id', $id)
        ->sum('amount');
        $netSales = $totalAmountSold * 0.97;
        $receiptDetails = Payment::where('event_id', $id)->get();
        //dd($receiptDetails);
        return view('org.report', compact('data','totalTicketsSold', 'totalAmountSold', 'netSales', 'order', 'receiptDetails'));
    }
}
