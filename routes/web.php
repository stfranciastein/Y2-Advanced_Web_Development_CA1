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
    // Routes for showing the monsters on page
    Route::get('/dashboard', [MonsterController::class, 'index'])->name('dashboard')->defaults('dashboard', true); //Allows the monsters to also display on dashboard
    Route::get('/monsters', [MonsterController::class, 'index'])->name('monsters.index');
 
    // Routes for the CRUD functionality of monsters   
    Route::get('/monsters/create', [MonsterController::class, 'create'])->name('monsters.create')->middleware('admin');
    Route::get('/monsters/{monster}', [MonsterController::class, 'show'])->name('monsters.show'); //Show needs to be below create, otherwise it will result in create giving a 404.
    Route::post('/monsters', [MonsterController::class, 'store'])->name('monsters.store')->middleware('admin');
    Route::get('/monsters/{monster}/edit', [MonsterController::class, 'edit'])->name('monsters.edit')->middleware('admin');
    Route::patch('/monsters/{monster}', [MonsterController::class, 'update'])->name('monsters.update')->middleware('admin');
    Route::delete('/monsters/{monster}', [MonsterController::class, 'destroy'])->name('monsters.destroy')->middleware('admin');
    // Routes for favourites
    Route::post('/monsters/{monster}/favourite', [MonsterController::class, 'favourite'])->name('monsters.favourite');
    Route::get('/favourites', [MonsterController::class, 'favourites'])->name('monsters.favourites');


});

require __DIR__.'/auth.php';
