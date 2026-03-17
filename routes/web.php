<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdoptionRequestController;

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
    return view('main');
})->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('pets', PetController::class);
    Route::resource('adoptionRequests', AdoptionRequestController::class);
    Route::post('/pets/search', [PetController::class, 'search'])->name('pets.search');
    Route::get('my_pets', [PetController::class, 'myPets'])->name('pets.my_pets');
    Route::get('my_requests', [AdoptionRequestController::class, 'myRequests'])->name('adoptionRequests.my_requests');
    Route::post('/adoptionRequests/{adoptionRequest}/accept', [AdoptionRequestController::class, 'accept'])->name('adoptionRequests.accept');
    Route::post('/adoptionRequests/{adoptionRequest}/refuse', [AdoptionRequestController::class, 'refuse'])->name('adoptionRequests.refuse');
});

Route::get('/test', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';
