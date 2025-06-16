<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\general;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [general::class, 'alumnos'])->name('index.alumnos');
Route::get('/editar/alumno/{id}',[general::class, 'editar'])->name('editar');
Route::put('/alumno/actualizar/{id}',[general::class, 'actualizar'])->name('alumno.actualizar');

Route::get('/creer/examen',[general::class, 'crearExamen'])->name('crear.examen');
Route::post('/examen/anadir', [general::class, 'anadir'])->name('examen.anadir');

Route::delete('/alumno/eliminar/{id}', [general::class, 'eliminar'])->name('alumno.eliminar');

Route::get('/alumno/crear', [general::class, 'nuevo_alumno'])->name('alumno.crear');
Route::post('/alumno/anadir', [general::class, 'anadir_nuevo_alumno'])->name('anadir.alumno.crear');


Route::get('/adjuntar/examen/alumno/{id}',[general::class, 'adjuntar_examen'])->name('adjuntar');
Route::put('/anadir/examen/alumno/{id}',[general::class, 'anadir_examen'])->name('anadir.examen');