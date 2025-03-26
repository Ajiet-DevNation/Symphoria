<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SponserController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\EventOrganizerController;
use App\Http\Controllers\MainOrganizerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('index');

Route::get('/about',[HomeController::class,'organizers']
)->name('about');

// Route::get('/qrcode',[HomeController::class,'qrcode_scanner']
// )->name('qrcode_scanner');
Route::get('/qrcode/{uid}',[HomeController::class,'user_details']
)->name('user_details');

// Route::get('/team',[HomeController::class,'team'])->name('team');

Route::get('/events',[HomeController::class,'events'])->name('all_events');
Auth::routes();

Route::get('/events/{id}',[HomeController::class,'event','id'])->name('event');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contact',function(){
    return view('frontend.contact');    
})->name('contact');

Route::get('/sponsors',[HomeController::class,'sponsors'])->name('sponsors');
Route::get('/link/storage',[HomeController::class,'link_storage'])->name('link_storage');
Route::post('/premium/addevents',[HomeController::class,'addEvents'])->name('add_events');
Route::get('/export/events/{id}',[HomeController::class,'exportSingleEvent','id'])->name('exportSingleEvent');
Route::get('/export/events',[HomeController::class,'exportAllEvent'])->name('exportAllEvents');
Route::get('/export/users',[HomeController::class,'exportAllUsers'])->name('exportAllUsers');
Route::get('/export/users/paid',[HomeController::class,'exportPaidUsers'])->name('exportPaidUsers');
Route::get('/export/users/unpaid',[HomeController::class,'exportUnPaidUsers'])->name('exportUnPaidUsers');

Route::middleware('auth')
    ->group(function(){
        Route::get('/profile',[HomeController::class,'profile'])->name('profile');
    });

Route::prefix('/admin')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('events', EventController::class);
        Route::resource('event-types', EventTypeController::class);
        Route::resource('sponsers', SponserController::class);
        Route::resource('users', UserController::class);
        Route::resource(
            'event-registrations',
            EventRegistrationController::class
        );
        Route::resource('main-organizers', MainOrganizerController::class);
        Route::resource('event-organizers', EventOrganizerController::class);
    });
