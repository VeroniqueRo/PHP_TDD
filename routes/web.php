<?php

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
    return view('welcome');
});

// Route vers la liste des projets
Route::get('/projects', 'ProjectController@index')->name('ListeDesProjets');

// Route vers le détail d'un projet
Route::get('/project/{id}', 'ProjectController@detailProject')->name('DetailDuProjet');

// Routes vers le formulaire d'ajout d'un projet
Route::get('/projectAjout', 'ProjectController@create')->name('FormAjoutUnProjet')->middleware('auth');
Route::post('/projects/liste', 'ProjectController@store')->name('AjoutUnProjet')->middleware('auth');

// Routes du formulaire de modification d'un projet
Route::get('/projectModif/{id}', 'ProjectController@edit')->name('formModifProjet')->middleware('auth');
Route::put('/project/{id}', 'ProjectController@update')->name('modifProjet')->middleware('auth');

// Routes d'authentification
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

