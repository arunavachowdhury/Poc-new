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

Route::get('/dashboard', function () {
    return view('includes.dashboard');
})->middleware('auth')->name('dashboard');

Route::resource('sample', 'SampleController')->middleware(['admin', 'director']);
Route::resource('isstandard', 'ISStandardController')->middleware(['admin', 'director']);
Route::resource('testitem', 'TestItemController')->middleware(['admin', 'director']);
Route::resource('customer', 'CustomerController')->middleware('auth');

Route::resource('test', 'TestController')->middleware('auth');
Route::get('/drafts', 'TestController@drafts')->middleware('auth')->name('test.drafts');
Route::get('/test/register/{id}', 'TestController@register')->middleware('auth')->name('test.regsiter');

Route::resource('lab', 'LabController');
Route::post('lab/{id}/user/allocate/', 'LabUserController@allocateUser')->name('allocate.user');
Route::post('lab/{id}/user/remove/', 'LabUserController@removeUser')->name('remove.user');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
