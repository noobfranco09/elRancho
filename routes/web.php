<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () { */
/*     return view('welcome'); */
/* }); */

Route::get("/dashboard", function () {
    return view("dashboard");
})->name("dashboard");

Route::get("/table-example", function () {
    return view("table-example");
})->name("table-example");

Route::resource("/animales", AnimalController::class)->only([
    "index", "create"
])->parameters(["animales" => "animal"]);


/* Route::get('/dashboard', function () { */
/*     return view('dashboard'); */
/* })->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
