<?php

use App\Models\category;
use App\Models\classroom;
use App\Models\objeto;
use Illuminate\Support\Facades\DB;
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
    //SELECT bdperdidosachados.objetos.*, bdperdidosachados.photos.designacao as photodes
    // FROM bdperdidosachados.objetos
    // left JOIN bdperdidosachados.photos
    // ON objetos.id = objeto_id;

    $objetos = DB::table('objetos')
        ->leftJoin('photos', 'objetos.id', '=', 'objeto_id')
        ->select('objetos.*', 'photos.designacao as photodes')
        ->where('objetos.delievered', '=', '0', 'AND', 'objetos.donated', '=', '0')
        ->get();

    $categorias = category::all();
    //$locais = classroom::all();

    return view('home', compact('objetos', 'categorias'));
});

Route::post('/', function (){

    $category_id = request('selectCat');

    //$classroom_id = request('selectSala');

    $categorias = category::all();

    //$locais = classroom::all();

    if($category_id == '*')
        $category_id = '';

    /* if($classroom_id == '*')
        $classroom_id = ''; */

    $objetos = objeto::where('category_id', 'LIKE', '%'.$category_id.'%')
    ->leftJoin('photos', 'objetos.id', '=', 'objeto_id')
        ->select('objetos.*', 'photos.designacao as photodes')
    ->get();
    //$objetos = objeto::where('classroom_id', 'LIKE', '%'.$classroom_id.'%')->get();

    return view('home', compact('objetos', 'categorias'));
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/objetos', [App\Http\Controllers\ObjetoController::class, 'index'])->middleware('auth')->name('objetos');

Route::post('/objetos', [App\Http\Controllers\ObjetoController::class, 'store'])->middleware('auth');
Route::get('/objetos/create', [App\Http\Controllers\ObjetoController::class, 'create'])->middleware('auth')->name('objetos.create');
Route::get('/objetos/{objeto}/edit', [App\Http\Controllers\ObjetoController::class, 'edit'])->middleware('auth');
Route::get('/objetos/{objeto}', [App\Http\Controllers\ObjetoController::class, 'show'])->name('objetos.show');
Route::put('/objetos/{objeto}', [App\Http\Controllers\ObjetoController::class, 'update'])->middleware('auth');

Route::delete('/objetos/{objeto}', [App\Http\Controllers\ObjetoController::class, 'destroy'])->middleware('auth');

Route::delete('/photos/{photo}/{descricao}', [App\Http\Controllers\PhotoController::class, 'destroy'])->middleware('auth');

Route::get('/categorias', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth')->name('categorias');
Route::post('/categorias', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth');
Route::get('/categorias/create', [App\Http\Controllers\CategoryController::class, 'create'])->middleware('auth')->name('categorias.create');
Route::delete('/categorias/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth');

Route::get('/locais', [App\Http\Controllers\ClassroomController::class, 'index'])->middleware('auth')->name('locais');
Route::post('/locais', [App\Http\Controllers\ClassroomController::class, 'store'])->middleware('auth');
Route::get('/locais/create', [App\Http\Controllers\ClassroomController::class, 'create'])->middleware('auth')->name('locais.create');
Route::delete('/locais/{classroom}', [App\Http\Controllers\ClassroomController::class, 'destroy'])->middleware('auth');

Route::get('/turmas', [App\Http\Controllers\TeamsController::class, 'index'])->middleware('auth')->name('turmas');
Route::post('/turmas', [App\Http\Controllers\TeamsController::class, 'store'])->middleware('auth');
Route::get('/turmas/create', [App\Http\Controllers\TeamsController::class, 'create'])->middleware('auth')->name('turmas.create');
Route::delete('/turmas/{teams}', [App\Http\Controllers\TeamsController::class, 'destroy'])->middleware('auth');

Route::get('/admin', [App\Http\Controllers\Admin\UserController::class, 'index'])->middleware('auth')->name('users');
Route::delete('/admin/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->middleware('auth');
