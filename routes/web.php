<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PropuestaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\Profesor_PropuestaController;
use App\Http\Controllers\AdminController;



Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/estudiantes/create', [AdminController::class, 'createEstudiante'])->name('admin.estudiantes.create');
Route::post('/admin/estudiantes', [AdminController::class, 'storeEstudiante'])->name('admin.estudiantes.store');
Route::get('/admin/estudiantes/{estudiante}/edit', [AdminController::class, 'editEstudiante'])->name('admin.estudiantes.edit');
Route::put('/admin/estudiantes/{estudiante}', [AdminController::class, 'updateEstudiante'])->name('admin.estudiantes.update');
Route::delete('/admin/estudiantes/{estudiante}', [AdminController::class, 'destroyEstudiante'])->name('admin.estudiantes.destroy');

Route::get('/admin/profesores/create', [AdminController::class, 'createProfesor'])->name('admin.profesores.create');
Route::post('/admin/profesores', [AdminController::class, 'storeProfesor'])->name('admin.profesores.store');
Route::get('/admin/profesores/{profesor}/edit', [AdminController::class, 'editProfesor'])->name('admin.profesores.edit');
Route::put('/admin/profesores/{profesor}', [AdminController::class, 'updateProfesor'])->name('admin.profesores.update');
Route::delete('/admin/profesores/{profesor}', [AdminController::class, 'destroyProfesor'])->name('admin.profesores.destroy');

Route::put('/admin/propuestas/{propuesta}/cambiar-estado', [AdminController::class, 'cambiarEstadoPropuesta'])->name('admin.propuestas.cambiarEstado');


Route::get('/estudiante/propuestas', [EstudianteController::class, 'index'])->name('estudiante.propuestas.index');
Route::get('/estudiante/propuestas/{propuesta}/comentarios', [EstudianteController::class, 'showComentario'])->name('estudiante.comentarios.show');
Route::get('/estudiante/propuestas/create', [EstudianteController::class, 'createPropuesta'])->name('estudiante.propuestas.create');
Route::post('/estudiante/propuestas', [EstudianteController::class, 'storePropuesta'])->name('estudiante.propuestas.store');

Route::get('/profesor', [ProfesorController::class, 'index'])->name('profesores.index');
Route::get('/profesor/propuestas/{propuesta}/download', [ProfesorController::class, 'download'])->name('profesor.propuesta.download');
Route::get('/profesor/propuestas/{propuesta}/comentarios', [ProfesorController::class, 'showComentario'])->name('profesor.comentarios.show');
Route::get('/profesor/propuestas/{propuesta}/comentarios/create', [ProfesorController::class, 'createComentario'])->name('profesor.comentarios.create');
Route::post('/profesor/propuestas/{propuesta}/comentarios', [ProfesorController::class, 'storeComentario'])->name('profesor.comentarios.store');
Route::delete('/profesor/{profesor}/comentarios/{id}', [ProfesorController::class, 'destroyComentario'])->name('profesor.comentarios.destroy');


