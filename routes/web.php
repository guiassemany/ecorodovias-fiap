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

use App\Occurrence;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/occurrences/search', 'OccurrencesController@search')->name('occurrences.search');
Route::get('/occurrences', 'OccurrencesController@index')->name('occurrences.index');
Route::get('/occurrences/{occurrence_id}/details', 'OccurrencesController@details')->name('occurrences.details');
Route::get('/occurrences/map', 'OccurrencesController@map')->name('occurrences.map');

Route::get('/teste', function(){
    $ocur = Occurrence::first();
    dd($ocur);
});
