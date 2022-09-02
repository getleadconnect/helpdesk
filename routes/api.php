<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TicketPriorityController;
use App\Http\Controllers\API\TicketStatusController;
use App\Http\Controllers\API\TicketGroupController;
use App\Http\Controllers\API\TicketTagController;
use App\Http\Controllers\API\EnquiriesController;
use App\Http\Controllers\API\TicketController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
        
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('ticket-statuses', TicketStatusController::class);
    Route::resource('ticket-priorities', TicketPriorityController::class);
    Route::resource('ticket-groups', TicketGroupController::class);
    Route::resource('ticket-tags', TicketTagController::class);
    Route::resource('enquiries', EnquiriesController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('products', ProductController::class);
});
