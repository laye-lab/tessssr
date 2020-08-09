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
    return view('welcome');
});
Route::get('/testlogin', function () {
    return view('testlogin');
});
Auth::routes();

Route::get('/home', 'AcceuilController@index')->name('Acceuil');

Route::get('/homeCommandeindex', 'HomeCommandeController@index')->name('homeCommandeindex');

Route::post('/homeCommande', 'HomeCommandeController@showForm')->name('homeCommandepost');

Route::get('/homeCommande', 'HomeCommandeController@showForm')->name('homeCommande');

Route::get('/homeSaisie', 'HomeSaisieController@index')->name('homeSaisie');

Route::get('/Calculheure', 'CalculheureController@index')->name('Calculheure');

Route::any('/CalculheureMois', 'CalculheureController@Showpermonth')->name('CalculheureMois');

Route::any('/CalculheureSecteur', 'CalculheureController@Showpersecteur')->name('CalculheureSecteur');

Route::any('/Saisie', 'SaisieController@index')->name('Saisie');

Route::get('/Validation', 'ValidationController@index')->name('Validation');

Route::post('/Validationstore', 'ValidationController@store');

Route::post('/Saisiestore', 'SaisieController@store')->name('Saisiestore');

Route::get('/Acceuil', 'AcceuilController@index')->name('Acceuil');

Route::post('/Commandeindex', 'CommandeController@index')->name('Commandeindex');

Route::get('/Commande', 'CommandeController@index');

Route::post('/Commandes', 'CommandeController@store')->name('Commandestore');

Route::resource('admin/user', 'Admin\UsersController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

Route::resource('user', 'UsersController');

});