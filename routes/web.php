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

/*login*/
Route::get('/system/supportstaff/add' , 'LoginController@index')->name('login');
Route::post('/system/supportstaff/add' , 'LoginController@verify');

Route::get('/system/supportstaff/admin' , 'AdminController@index')->name('admin.home');
Route::get('/system/supportstaff/manager', 'ManagerController@index')->name('manager.index');

Route::get('/system/buses', 'AdminController@busList')->name('admin.buses');

Route::get('/system/buses/add' , 'AdminController@addBus')->name('admin.addBus');
Route::post('/system/buses/add' , 'AdminController@insertBus');

Route::get('/system/buses/{id}/edit' , 'AdminController@editBus')->name('edit.bus');
Route::patch('/system/buses/{id}/edit', 'AdminController@updateBus');

Route::delete('/system/buses/{id}/delete', 'AdminController@deleteBus')->name('delete.bus');

Route::get('/system/busesschedule', 'AdminController@busSchedule')->name('admin.busSchedule');


Route::get('/system/busSchedule/add', 'AdminController@addBusSchedule')->name('admin.addBusSchedule');
Route::post('/system/busSchedule/add', 'AdminController@insertBusSchedule')->name('admin.addBusSchedule');

Route::post('/system/buses/ajax/{search}', 'AdminController@searchBus')->name('admin.searchBus');

Route::get('/edit/{id}' , 'AdminController@editBusSchedule')->name('edit.busSchedule');
Route::post('/edit/{id}' , 'AdminController@updateBusSchedule')->name('update.busSchedule');

Route::get('/system/manager/busList', 'ManagerController@busList')->name('manager.busList');

Route::get('/system/manager/busesschedule', 'ManagerController@busSchedule')->name('manager.Schedule');

Route::get('/system/busSchedule/manager/add', 'ManagerController@addBusSchedule')->name('manager.addBusSchedule');
Route::post('/system/busSchedule/manager/add', 'ManagerController@insertBusSchedule');

Route::get('/system/supportstuff/logout', 'LogoutController@index')->name('logout');
