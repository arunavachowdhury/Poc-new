<?php

use Illuminate\View\View;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return View('admin.home');
})->middleware(['auth'])->name('dashboard');


Route::resource('testorder', 'TestOrder\TestOrderController')->middleware('auth');

Route::get('/testorderprint/{id}', 'TestOrder\TestOrderController@pdf')->name('testorder.print');

Route::get('/sentforreview/{id}', 'TestOrder\TestOrderController@sentforreview')->name('testorder.sentforreview');

Route::resource('ordertestitem', 'OrderTestItem\OrderTestItemController')->middleware('auth');

Route::get('/testorderreview', 'TestOrder\TestOrderController@index')->name('testorder.review');

// review resource

Route::resource('review', 'Review\ReviewController')->middleware('auth');

// test
Route::resource('test', 'Test\TestController')->middleware('auth');
Route::get('registertest/{id}', 'Test\TestController@registerTest')->name('register.test')->middleware('auth');

Route::post('/joballocate/{id}', 'Test\TestController@joballocate')->name('job.allocate');
Route::get('/testreport', 'TestReport\TestReportController@index')->name('test.report');
Route::get('/testreportshow/{id}', 'TestReport\TestReportController@show')->name('test.report.show');