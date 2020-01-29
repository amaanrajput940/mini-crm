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

Route::prefix("dashboard")->group(function() {
    Route::namespace('Admin')
        //->prefix('dashboard')
        ->group(function () {
            Route::resource('/', 'DashboardController');
            //Route::prefix('dashboard')->group(function () {
                Route::resource('companies', 'CompanyController');
                Route::resource('employees', 'EmployeeController');

            //});
        });
});
Route::get('dashboard/locale/{lang}', 'Admin\LocaleController@switch');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
