<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CandidatFormationController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormationReferentielController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\RelationShipController;
use App\Http\Controllers\TypeController;
use App\Models\Candidat;
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
// dashboard route
Route::get('/candidatf', [ChartController::class, 'formationC'])->name('candidats.formations');
Route::get('/formationr', [ChartController::class, 'formationr'])->name('formations.referentiels');
Route::get('/sexe', [ChartController::class, 'sexe'])->name('candidats.sexe');
Route::get('/formationt', [ChartController::class, 'formationt'])->name('formations.types');
Route::get('/age', [ChartController::class, 'age'])->name('candidats.age');
Route::get('/stats', [ChartController::class, 'statistique'])->name('formations.stats');
// home page
Route::get('/', [FormationController::class, 'acceuil']);
// crud route
Route::resource('types', TypeController::class);
Route::resource('referentiels', ReferentielController::class);
Route::resource('formations', FormationController::class);
Route::resource('candidats', CandidatController::class);
// relationship route
Route::get('/relations', [RelationShipController::class, 'index'])->name('relations.index');
Route::post('/relationsc', [RelationShipController::class, 'storeF'])->name('relations.storeF');
Route::post('/relationsf', [RelationShipController::class, 'storeC'])->name('relations.storeC');
