<?php

use App\Http\Controllers\ProfileController;
use App\Models\Animal;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get("/dashboard", function () {
    return view("dashboard");
})->middleware(['auth', 'verified'])->name("dashboard");

Route::get("/animales", function () {
    return view("animal.index");
})->middleware(['auth', 'verified'])->name("animales");

Route::get("/vacunas", function () {
    return view("vacuna.index");
})->middleware(['auth', 'verified'])->name("vacunas");

Route::get("/table-example", function () {
    return view("table-example");
})->middleware(['auth', 'verified'])->name("table-example");

Route::get("/establos", function () {
    return view("establo.index");
})->middleware(['auth', 'verified'])->name("establos");

Route::get("/cajones", function () {
    return view("cajon.index");
})->middleware(['auth', 'verified'])->name("cajones");

Route::get("/roles", function () {
    return view("rol.index");
})->middleware(['auth', 'verified'])->name("roles");

Route::get("/empleados", function () {
    return view("empleado.index");
})->middleware(['auth', 'verified'])->name("empleados");

Route::get("/clientes", function () {
    return view("cliente.index");
})->middleware(['auth', 'verified'])->name("clientes");


Route::get("/veterinarios", function () {
    return view("Veterinario.index");
})->middleware(['auth', 'verified'])->name("veterinarios");


Route::get("/inventario", function () {
    return view("Inventario.index");
})->name("inventario");



Route::get("/animales/{id}", function ($id) {
    $animal = Animal::find($id);
    return view("animal.show", compact("animal"));
})->middleware(['auth', 'verified'])->name("animales.show");

Route::get("/cliente/", function () {
    return view("cliente.create");
})->name("clientes.create");


Route::get("/venta/{cliente}", function (Cliente $cliente) {
    return view("venta.registro", compact("cliente"));
})->name("venta.registro");



/* Route::get('/dashboard', function () { */
/*     return view('dashboard'); */
/* })->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
