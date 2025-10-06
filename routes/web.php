<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () { */
/*     return view('welcome'); */
/* }); */

Route::get("/dashboard", function () {
    return view("dashboard");
})->name("dashboard");

Route::get("/animales", function () {
    return view("animal.index");
})->name("animales");

Route::get("/vacunas", function () {
    return view("vacuna.index");
})->name("vacunas");

Route::get("/table-example", function () {
    return view("table-example");
})->name("table-example");

Route::get("/establos", function () {
    return view("establo.index");
})->name("establos");

Route::get("/cajones", function () {
    return view("cajon.index");
})->name("cajones");

Route::get("/veterinarios", function () {
    return view("Veterinario.index");
})->name("veterinarios");

Route::get("/animales/{id}", function ($id) {
    $animal = Animal::find($id);
    return view("animal.show", compact("animal"));
})->name("animales.show");


/* Route::get('/dashboard', function () { */
/*     return view('dashboard'); */
/* })->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
