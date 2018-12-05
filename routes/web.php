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
})->middleware('auth');

Route::resource('sample', 'SampleController');
Route::resource('isstandard', 'ISStandardController');
Route::resource('testitem', 'TestItemController');
Route::resource('customer', 'CustomerController');
Route::resource('test', 'TestController');
Route::resource('lab', 'LabController');
Route::post('lab/user/allocate/{id}', 'LabUserController@allocateUser')->name('allocate.user');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
