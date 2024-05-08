<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\AdminController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavouritesController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*************************************************************
/*                         User                             */
/********************************************************** */

/*Home*/ 
Route::get('/', [EventsController::class, 'index'])->name('home');

/*Auth*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginProcess', [AuthController::class, 'loginProcess'])->name('loginProcess');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signupUser', [AuthController::class, 'signupUser'])->name('signupUser');

/*Search*/
Route::get('/search', [EventsController::class, 'search'])->name('search');

/*Event Description page*/
Route::get('/events/{events}', [EventsController::class, 'show'])->name('events.show');

/*Event Category*/
Route::get('/events/category/{category}', [EventsController::class, 'category'])->name('events.category');

/*Log out*/
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/musicEvent', function () {
    return view('musicEvent', [
        "eventName" => "HausBoom Concert",
        "date" => "2-06-2024",
    ]);
});

Route::get('/artsEvent', function () {
    return view('artsEvent');
});

/*************************************************************
/*                         Favourites                           */
/********************************************************** */
/* Favourites */
//Route::post('addToFavourites2', [FavouritesController::class, 'add2'])->name('addToFavourites');
Route::middleware(['auth'])->group(function () {
    Route::get('favourites', [FavouritesController::class, 'index']);
    Route::get('addToFavourites2', [FavouritesController::class, 'add2'])->name('addToFavourites2');
    Route::get('/removeFavourites/{eventId}', [FavouritesController::class, 'removeFavourites'])->name('removeFavourites');
    /* show favourites  /show2/"*/
    Route::get('/show2/{email}', [FavouritesController::class, 'show2'])->name('show2');

});



/*************************************************************
/*                         Payment                           */
/********************************************************** */

Route::post('/session', [StripeController::class, 'session'])->name('session')->middleware('auth');
Route::get('/success', [StripeController::class, 'success'])->name('success'); // Update this line
Route::post('/stripe/webhook', [StripeController::class, 'webhook']);


/*************************************************************
/*                         Organization                     */
/********************************************************** */

// Navbar (Home, event, report)
Route::get('/organization', [OrganizationController::class, 'organization'])->name('organizationhome');
Route::middleware(['auth'])->group(function () {
    Route::get('/organization/manageEvent', [OrganizationController::class, 'showEvent'])->name('organization.showEvent');
});

//Manage events
/*Create Event*/
Route::get('/organization/manageEvent/createEvent', [OrganizationController::class, 'createEventForm'])->name('organization.createEvent');
Route::middleware(['auth'])->group(function () {
Route::post('/createEvent', [OrganizationController::class, 'createEvent'])->name('organization.insertEvent');
});

/* Edit Event */
Route::get('/getEvent/{id}', [OrganizationController::class, 'getEvent'])->name('organization.getEvent');
Route::post('/updateEvent/{id}', [OrganizationController::class, 'updateEvent'])->name('organization.updateEvent');

/* Delete Event */
Route::get('/deleteEvent/{id}', [OrganizationController::class, 'deleteEvent'])->name('organization.deleteEvent');

/*Get Report*/
Route::get('/getReport/{id}', [OrganizationController::class, 'showReport'])->name('organization.showReport');
//Report

/*****************************************************
                          Admin
******************************************************/
Route::get('/admin', [AdminController::class, 'dashboard']);

/**Manage Events**************************/
Route::get('/events', [AdminController::class, 'eventindex']);

Route::get('/createevent', [AdminController::class, 'createevent']); 
Route::post('/storeevent', [AdminController::class, 'storeevent']); 

Route::get('editevent/{id}', [AdminController::class, 'editevent']);

Route::put('updateevent/{id}', [AdminController::class, 'updateevent']);

Route::delete('deleteevent/{id}', [AdminController::class, 'destroyevent']);

/**Manage Requests**************************/
Route::get('/requests', [AdminController::class, 'requests']);

Route::any('details/{id}', [AdminController::class, 'details']);

Route::post('updateStatus/{id}/{action}', [AdminController::class, 'updateStatus']);

/**Manage Sponsor Requests**************************/
Route::get('/sponsor2', [AdminController::class, 'sponsor2']);

Route::post('updateSponsorStatus/{id}/{action}', [AdminController::class, 'updateSponsorStatus']);


/*Sponsorships*****************************/ 
Route::get('/sponsors', [AdminController::class, 'sponsorIndex']);

Route::get('/createsponsor', [AdminController::class, 'createsponsor']);
Route::post('/storesponsor', [AdminController::class, 'storesponsor']);

Route::get('editsponsor/{id}', [AdminController::class, 'editsponsor']);
Route::put('updatesponsor/{id}', [AdminController::class, 'updatesponsor']);

Route::delete('deletesponsor/{id}', [AdminController::class, 'destroysponsor']);

/*Report*************************************/
Route::get('report/{id}', [AdminController::class, 'report']);

/*Manage Accounts******************************************/
Route::get('/accounts', [AdminController::class, 'userIndex']);

Route::get('/createuser', [AdminController::class, 'createuser']);
Route::post('/storeuser', [AdminController::class, 'storeuser']);

Route::delete('deleteuser/{id}', [AdminController::class, 'destroyuser']);
