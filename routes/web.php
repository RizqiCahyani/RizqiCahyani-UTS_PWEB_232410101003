<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [PageController::class, 'login'])->name('login.process');
Route::post('/logout', [PageController::class, 'logout'])->name('logout');

Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    Route::get('/recipes/create', [PageController::class, 'createRecipe'])->name('recipes.create');

    // Resep
    Route::get('/recipes', [PageController::class, 'showRecipes'])->name('recipes');
    Route::post('/recipes', [PageController::class, 'storeRecipe'])->name('recipes.store');
    Route::delete('/recipes/{id}', [PageController::class, 'deleteRecipe'])->name('recipes.destroy');
});
