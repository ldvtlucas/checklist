<?php

use App\Http\Controllers\ComplexidadeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NaoConformidadesController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\ChecklistController;
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

#Route::get('/', [MenuController::class, 'index'])->name('menu.index');



Route::resource('/{projeto_id}/{processo_id}/checklist', ChecklistController::class);
Route::get('/{projeto_id}/{processo_id}/checklist/{id}/avaliar', 
            [ChecklistController::class, 'avaliar'])->name('checklist.avaliar');
Route::post('/{projeto_id}/{processo_id}/checklist/{id}/avaliado', 
            [ChecklistController::class, 'avaliado'])->name('checklist.avaliado');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/home/projetos', ProjetosController::class);
Route::resource('/home/nao-conformidades', NaoConformidadesController::class);
Route::resource('/complexidades', ComplexidadeController::class);
Route::resource('home/processos', ProcessosController::class);

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
