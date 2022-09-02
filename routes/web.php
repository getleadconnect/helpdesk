<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('layouts.master');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('login-user', [LoginController::class, 'verifyLogin'])->name('login-user');

Route::group(['middleware' => 'auth'], function () 
{
    Route::controller(TicketController::class)->group(function(){
        Route::get('tickets', 'index')->name('tickets');
        Route::get('tickets-counts','getTicketCounts')->name('tickets-counts');
        Route::post('update-ticket-status','updateTicketStatus')->name('update-ticket-status');
        Route::post('filter-tickets','filterTickets')->name('filter-tickets');
        Route::post('sort-tickets','sortTickets')->name('sort-tickets');
        Route::post('create-ticket','createTicket')->name('create-ticket');
        Route::post('view-ticket','viewTicket')->name('view-ticket');
    });
});