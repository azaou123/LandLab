<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/imprimer/{id}', [ProfileController::class, 'imprimer'])->name('imprimer');
Route::get('/supprimer/{id}', [ProfileController::class, 'supprimer'])->name('supprimer');
Route::get('/suspendre/{id}', [ProfileController::class, 'suspendre'])->name('suspendre');
Route::get('/userProfile/{id}', [ProfileController::class, 'userProfile'])->name('userProfile');
Route::post('/addJours/', [ProfileController::class, 'addJours'])->name('addJours');
Route::post('/envoyer', [ProfileController::class, 'envoyer'])->name('envoyer');
Route::post('/upload', [ProfileController::class, 'upload'])->name('upload');
Route::get('/dashboard', [ProfileController::class, 'show']);
Route::get('/delete/{id}',[ProfileController::class, 'delete']);
Route::post('/update/{id}',[ProfileController::class, 'modifier']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
