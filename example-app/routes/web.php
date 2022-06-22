<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/objetos', [App\Http\Controllers\ObjetoController::class, 'index'])->name('objetos');
Route::post('/objetos', [App\Http\Controllers\ObjetoController::class, 'store']);
Route::get('/objetos/create', [App\Http\Controllers\ObjetoController::class, 'create'])->name('objetos.create');

Route::get('/categorias', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categorias');
Route::post('/categorias', [App\Http\Controllers\CategoriesController::class, 'store']);
Route::get('/categorias/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categorias.create');

Route::get('/locais', [App\Http\Controllers\ClassroomsController::class, 'index'])->name('locais');
Route::post('/locais', [App\Http\Controllers\ClassroomsController::class, 'store']);
Route::get('/locais/create', [App\Http\Controllers\ClassroomsController::class, 'create'])->name('locais.create');

Route::get('/turmas', [App\Http\Controllers\TeamsController::class, 'index'])->name('turmas');
Route::post('/turmas', [App\Http\Controllers\TeamsController::class, 'store']);
Route::get('/turmas/create', [App\Http\Controllers\TeamsController::class, 'create'])->name('turmas.create');
