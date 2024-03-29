<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Schedule
    Route::get('/',[ScheduleController::class, 'schedule'])->name('schedule.index');
    Route::get('/schedule',[ScheduleController::class, 'index'])->name('schedule');
    Route::post('/schedule/store',[ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}/edit',[ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::post('/schedule/update/{id}',[ScheduleController::class, 'update'])->name('schedule.update');

});

require __DIR__.'/auth.php';
