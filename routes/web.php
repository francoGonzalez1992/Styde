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
use App\Note;

Route::get('/', function () {
    return 'Notas';
});

Route::get('/notes', 'NoteController@index');

/*
Route::get('notes', function(){
	return view('notes');
});
*/
Route::post('notes', 'NoteController@store');

Route::get('/notes/create', 'NoteController@create');

Route::get('notes/{note}', 'NoteController@show')->where('note','[0-9]+');

Route::get('notes/json', function(){
	return [
		'notes' => 'create'
	];
});
