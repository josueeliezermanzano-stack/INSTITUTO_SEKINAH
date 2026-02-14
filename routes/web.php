<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPreRegistroController;
use App\Http\Controllers\PreRegistroController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\InformacionController;
Route::get('/', function () {
    return view('index');
});
Route::get('/inscripcion', function () {
    return view('inscripcion');
});
Route::get('/planes', function () {
    return view('planes');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/registro', function () {
    return view('registro');
});
Route::middleware('sesion')->group(function () {
    Route::get('/inicio', fn () => view('inicio'));
});

Route::get('/logout', [RegistroController::class, 'logout']);
Route::middleware('sesion')->group(function () {
    Route::get('/adminInscripcion', [AdminPreRegistroController::class, 'index']);
    Route::get('/materias', [MateriasController::class, 'index']);
    Route::get('/periodo', [PeriodoController::class, 'index']);
    Route::get('/informacion', [InformacionController::class, 'index']);
});
Route::post('/adminInscripcion/aprobar',[AdminPreRegistroController::class, 'aprobar'])->name('admin.aprobar');
Route::post('/adminInscripcion/rechazar',[AdminPreRegistroController::class, 'rechazar'])->name('admin.rechazar');
Route::get('/preregistro', [PreRegistroController::class, 'create'])->name('preregistro.create'); 
Route::post('/preregistro', [PreRegistroController::class, 'store'])->name('preregistro.store'); 
Route::post('/materias/eliminar', [MateriasController::class, 'eliminar'])->name('materias.eliminar');
Route::post('/materias/asignar', [MateriasController::class, 'asignar']);
Route::get('/registro', [RegistroController::class, 'create'])->name('registro.create'); 
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store'); 
Route::post('/materias/asignar-alumnos', [MateriasController::class, 'asignarAlumnos']);
Route::post('/periodo/guardar', [PeriodoController::class, 'store']) ->name('periodo.store');
Route::post('/materias/ver', [MateriasController::class, 'ver'])->name('materias.ver');
Route::post('/materias/guardar-calificacion', [MateriasController::class, 'guardarCalificacion']);
Route::post('/informacion/guardar', [InformacionController::class, 'store']) ->name('informacion.store');