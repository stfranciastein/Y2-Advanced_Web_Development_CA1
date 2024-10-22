<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MonsterController;
use Illuminate\Support\Facades\Route;


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
    // Routes for showing the monsters page
    Route::get('/monsters', [MonsterController::class, 'index'])->name('monsters.index');    
    // Routes for the CRUD functionality of monsters   
    Route::get('/monsters/create', [MonsterController::class, 'create'])->name('monsters.create');
    Route::get('/monsters/{monster}', [MonsterController::class, 'show'])->name('monsters.show');
    Route::post('/monsters', [MonsterController::class, 'store'])->name('monsters.store');    
});

require __DIR__.'/auth.php';
