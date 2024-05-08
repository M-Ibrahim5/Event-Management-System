<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use App\Models\Favourites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FavouritesController extends Controller
{

    public function index()
    {
        $favourites = Favourites::where('email', Auth::user()->email);
        return view('favourites.favourites', compact('favourites'));
    }

    public function show2($email)
    {
        // Retrieve the favorites associated with the user's email
        $eventList = Favourites::where('email', $email)->get();

        // Retrieve the details of events associated with each favorite
        $eventDetails = $eventList->map(function ($favourites) {
            return $favourites->events;
        });

        return view('favourites.favourites', compact('eventDetails'));
    }

    public function removeFavourites($eventId)
    {
        $userEmail = Auth::user()->email;

        $favourite = Favourites::where('eventId', $eventId)
            ->where('email', $userEmail)
            ->first();

        if ($favourite) {
            $favourite->delete();

            return redirect()->back()->with('status', 'Removed from favourites');
        }

        return redirect()->back()->with('error', 'Event not found in favourites');
    }


    public function add2(Request $request)
    {
        $eventId = $request->eventId;
        $userEmail = Auth::user()->email;

        // Check if the event is already in the user's favorites
        $existingFavorite = Favourites::where('eventId', $eventId)
            ->where('email', $userEmail)
            ->first();

        if ($existingFavorite) {
            // If the event is already in favorites, you can handle this case accordingly.
            // For example, you can redirect back with an error message.
            return redirect()->back()->with('error', 'Event is already in the favorites');
        }

        // If the event is not in favorites, add it to the database
        Favourites::create([
            'eventId' => $eventId,
            'email' => $userEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('status', 'Added to favorites');
    }

    public function getFavoriteCount()
    {
        return Favourites::where('email', Auth::user()->email)->count();
    }
}
