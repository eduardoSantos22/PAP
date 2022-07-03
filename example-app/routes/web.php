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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/objetos', [App\Http\Controllers\ObjetoController::class, 'index'])->middleware('auth')->name('objetos');
Route::post('/objetos', [App\Http\Controllers\ObjetoController::class, 'store'])->middleware('auth');
Route::get('/objetos/create', [App\Http\Controllers\ObjetoController::class, 'create'])->middleware('auth')->name('objetos.create');
Route::get('/objetos/{objeto}/edit', [App\Http\Controllers\ObjetoController::class, 'edit'])->middleware('auth');
Route::put('/objetos/{objeto}', [App\Http\Controllers\ObjetoController::class, 'update'])->middleware('auth');

Route::get('/categorias', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth')->name('categorias');
Route::post('/categorias', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth');
Route::get('/categorias/create', [App\Http\Controllers\CategoryController::class, 'create'])->middleware('auth')->name('categorias.create');

Route::get('/locais', [App\Http\Controllers\ClassroomController::class, 'index'])->middleware('auth')->name('locais');
Route::post('/locais', [App\Http\Controllers\ClassroomController::class, 'store'])->middleware('auth');
Route::get('/locais/create', [App\Http\Controllers\ClassroomController::class, 'create'])->middleware('auth')->name('locais.create');

Route::get('/turmas', [App\Http\Controllers\TeamsController::class, 'index'])->middleware('auth')->name('turmas');
Route::post('/turmas', [App\Http\Controllers\TeamsController::class, 'store'])->middleware('auth');
Route::get('/turmas/create', [App\Http\Controllers\TeamsController::class, 'create'])->middleware('auth')->name('turmas.create');


