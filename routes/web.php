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

Route::get('/',['middleware' => ['auth'], function () {
    return view('auth.login');
}]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('user/entries', 'App\Http\Controllers\User\EntriesController@entries')->name('user.entries');;
    Route::post('user/create_entry', 'App\Http\Controllers\User\EntriesController@createEntry')
        ->name('user.entries.create');
    Route::get('user/get_all_entries', 'App\Http\Controllers\User\EntriesController@getAllEntries')
        ->name('user.entries.getAll');
    Route::post('user/update_entry/{id_entry}', 'App\Http\Controllers\User\EntriesController@updateEntry')
        ->name('user.entries.update');
    Route::delete('user/delete_entry/{id_entry}', 'App\Http\Controllers\User\EntriesController@deleteEntry')
        ->name('user.entries.delete');
});