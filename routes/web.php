<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CandidatFormationController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormationReferentielController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\TypeController;
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

Route::get('/', [FormationController::class, 'acceuil']);
Route::resource('types',TypeController::class);
Route::resource('referentiels',ReferentielController::class);
Route::resource('formations',FormationController::class);
Route::resource('formation_referentiels',FormationReferentielController::class);
Route::resource('candidat_formations',CandidatFormationController::class);
Route::resource('candidats',CandidatController::class);
