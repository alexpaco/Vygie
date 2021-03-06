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

Route::get('/principale', 'AfficheVilleController@afficheDepartement');

Route::get('/', function () {
    return view('accueil');
});

Route::post('afficheVille', 'AfficheVilleController@afficheVilles');

Route::post('afficheEcole', 'AfficheVilleController@afficheEcoles');

Route::post('afficheMaladie','AfficheVilleController@afficheMaladie');