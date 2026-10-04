<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\User;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $currentDate = Carbon::now()->toDateString();

    // Confirmed events that haven't started yet, soonest first.
    // (MySQL's default collation already ignores case for 'Confirmed'.)
    $data = DB::table('events')
        ->where('eventStatus', 'Confirmed')
        ->whereDate('eventStartDate', '>=', $currentDate)
        ->orderBy('eventStartDate')
        ->take(10)
        ->get();

    // dd($data);    
    return view('home', compact('data'));
}


    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Perform the search using your model
        $results = Events::where('eventName', 'LIKE', '%' . $keyword . '%')
            ->where('eventStatus', 'Confirmed')
            ->orderBy('eventStartDate')
            ->get();

        return view('searchResult', ['results' => $results, 'keyword' => $keyword]);
    }

    public function category($category)
    {
        //dd($category);
        //$eventCategory = Events::where('eventCategory', $category)->first();

        // Perform the search using your model
        $results = Events::where('eventCategory', 'LIKE', '%' . $category . '%')
            ->where('eventStatus', 'Confirmed')
            ->orderBy('eventStartDate')
            ->get();
        //dd($results);

        return view('categoryResult', ['results' => $results , 'category' => $category]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        $eventDetails = Events::where('id', $events->id)->first();
        $userDetails = User::where('email', $eventDetails->email)->first();
        $totalTicketsSold = Payment::where('event_id', $events->id)->sum('ticket_quantity');
        
        return view('show', [
            'events' => $eventDetails,
            'organizer' => $userDetails,
            'totalTicketsSold' => $totalTicketsSold // Pass totalTicketsSold to the view
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, Events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        //
    }

    /*
    public function likeEvent(Request $request, $eventId)
    {
        $user = auth()->user();
        $event = Events::findOrFail($eventId);

        // Check if the user already liked the event
        if ($user->hasLikedEvent($event)) {
            // Unlike the event
            $user->eventLikes()->detach($event);
            return response()->json(['liked' => false]);
        } else {
            // Like the event
            $user->eventLikes()->attach($event);
            return response()->json(['liked' => true]);
        }
    }
    */
}
