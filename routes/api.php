<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\SponserController;
use App\Http\Controllers\Api\EventTypeController;
use App\Http\Controllers\Api\EventRuleController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\MainOrganizerController;
use App\Http\Controllers\Api\EventOrganizerController;
use App\Http\Controllers\Api\EventEventRulesController;
use App\Http\Controllers\Api\EventTypeEventsController;
use App\Http\Controllers\Api\EventRegistrationController;
use App\Http\Controllers\Api\EventEventOrganizersController;
use App\Http\Controllers\Api\UserEventRegistrationsController;
use App\Http\Controllers\Api\EventEventRegistrationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('events', EventController::class);

        // Event Event Organizers
        Route::get('/events/{event}/event-organizers', [
            EventEventOrganizersController::class,
            'index',
        ])->name('events.event-organizers.index');
        Route::post('/events/{event}/event-organizers', [
            EventEventOrganizersController::class,
            'store',
        ])->name('events.event-organizers.store');

        // Event Event Rules
        Route::get('/events/{event}/event-rules', [
            EventEventRulesController::class,
            'index',
        ])->name('events.event-rules.index');
        Route::post('/events/{event}/event-rules', [
            EventEventRulesController::class,
            'store',
        ])->name('events.event-rules.store');

        // Event Event Registrations
        Route::get('/events/{event}/event-registrations', [
            EventEventRegistrationsController::class,
            'index',
        ])->name('events.event-registrations.index');
        Route::post('/events/{event}/event-registrations', [
            EventEventRegistrationsController::class,
            'store',
        ])->name('events.event-registrations.store');

        Route::apiResource('event-types', EventTypeController::class);

        // EventType Events
        Route::get('/event-types/{eventType}/events', [
            EventTypeEventsController::class,
            'index',
        ])->name('event-types.events.index');
        Route::post('/event-types/{eventType}/events', [
            EventTypeEventsController::class,
            'store',
        ])->name('event-types.events.store');

        Route::apiResource('sponsers', SponserController::class);

        Route::apiResource('users', UserController::class);

        // User Event Registrations
        Route::get('/users/{user}/event-registrations', [
            UserEventRegistrationsController::class,
            'index',
        ])->name('users.event-registrations.index');
        Route::post('/users/{user}/event-registrations', [
            UserEventRegistrationsController::class,
            'store',
        ])->name('users.event-registrations.store');

        Route::apiResource(
            'event-registrations',
            EventRegistrationController::class
        );

        Route::apiResource('main-organizers', MainOrganizerController::class);

        Route::apiResource('event-organizers', EventOrganizerController::class);
    });
