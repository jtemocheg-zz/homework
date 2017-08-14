<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/changeString', 'HomeController@changeString');
Route::post('/completeRange', 'HomeController@completeRange');
Route::post('/clearPar', 'HomeController@clearPar');

Route::get('/employees', 'EmployeeController@index')->name('employees.index');
Route::get('/employee/{id}', 'EmployeeController@show')->name('employee.show');
Route::post('/employees', 'EmployeeController@service')->name('employee.service');