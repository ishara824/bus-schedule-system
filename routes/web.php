<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['roles:ADMIN,MANAGER,STAFF']);
Route::get('/buses', [App\Http\Controllers\BusController::class, 'findAllBuses'])->name('bus.list.ui')->middleware(['roles:ADMIN,MANAGER,STAFF']);
Route::get('/bus-routes', [App\Http\Controllers\BusController::class, 'findAllBusRoutes'])->name('routes.list.ui')->middleware(['roles:ADMIN,MANAGER']);
Route::get('/register-bus', [App\Http\Controllers\BusController::class, 'registerBusForm'])->name('bus.register.ui')->middleware(['roles:ADMIN,STAFF']);
Route::get('/schedule-bus', [App\Http\Controllers\BusController::class, 'scheduleBusForm'])->name('bus.schedule.ui')->middleware(['roles:ADMIN,STAFF']);
Route::get('/all-bus-schedules', [App\Http\Controllers\BusController::class, 'findAllBusSchedules'])->name('bus.schedules.list.ui')->middleware(['roles:ADMIN,MANAGER,STAFF']);

Route::post('/register-bus', [App\Http\Controllers\BusController::class, 'registerBus'])->middleware(['roles:ADMIN,STAFF']);
Route::post('/schedule-bus', [App\Http\Controllers\BusController::class, 'scheduleBus'])->middleware(['roles:ADMIN,STAFF']);


