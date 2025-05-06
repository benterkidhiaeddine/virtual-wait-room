<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\PatientController; 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;


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
});

// Patients routes
Route::get('/queues', [QueueController::class, 'index'])->name('queues.index');
Route::get('/queues/create', [QueueController::class, 'create'])->name('queues.create');
Route::post('/queues', [QueueController::class, 'store'])->name('queues.store');
Route::get('/queues/{id}', [QueueController::class, 'show'])->name('queues.show');
Route::post('/queues/{id}/add-patient', [QueueController::class, 'addPatient'])->name('queues.addPatient');
Route::get('/patients/{patient}/edit-patient', [PatientController::class, 'edit'])->name( "patient.edit");
Route::patch('/patients/{patient}', [PatientController::class, 'update'])->name( "patient.update");
// Chirps routes
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);
require __DIR__.'/auth.php';
