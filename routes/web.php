<?php
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComplexidadeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NaoConformidadesController;
use App\Http\Controllers\ProcessosController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\LojaController;
use GuzzleHttp\Middleware;
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




Auth::routes();

Route::get('/', function () {  return redirect('/home');  });
Route::get('/home', [MenuController::class, 'index'])->name('home.index')->middleware('auth');

Route::group(['prefix' => 'franqueadora', 'middleware' => 'auth'], function () {
    Route::resource('/lojas', LojaController::class);
    Route::resource('/checklists', ChecklistController::class);
    Route::resource('/categorias', CategoriaController::class);
});

Route::group(['prefix' => 'franqueado', 'middleware' => 'auth'], function () 
{
    Route::resource('/nao-conformidades', NaoConformidadesController::class);
    Route::group(['prefix' => '/avaliacao'], function () 
    {
        Route::get('/{cl_id}/avaliar/1', [AvaliacaoController::class, 'avaliarStep1'])->name('avaliacao.avaliar.s1');
        Route::post('/{cl_id}/avaliar/2', [AvaliacaoController::class, 'avaliarStep2'])->name('avaliacao.avaliar.s2');
        Route::post('/{cl_id}/avaliar/3', [AvaliacaoController::class, 'avaliarStep3'])->name('avaliacao.avaliar.s3');
    });
    Route::resource('/avaliacao', AvaliacaoController::class);
    

});



Route::resource('/complexidades', ComplexidadeController::class);




