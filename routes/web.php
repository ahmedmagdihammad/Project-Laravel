<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route Branch
Route::get('/branch', 'Admin\\BranchController@index')->name('home.branch');
Route::post('/branch/store', 'Admin\\BranchController@store')->name('branch.store');
Route::post('/branch/update', 'Admin\\BranchController@update')->name('branch.update');
Route::post('/branch/delete', 'Admin\\BranchController@destroy')->name('branch.delete');

// Pages Students
Route::get('/student', 'Admin\\StudentController@index')->name('home.student');
Route::post('/student/store', 'Admin\\StudentController@store')->name('student.store');
Route::post('/student/update', 'Admin\\StudentController@update')->name('student.update');
Route::post('/student/delete', 'Admin\\StudentController@destroy')->name('student.delete');

// Route Offer
Route::get('/offer', 'Admin\\OfferController@index')->name('home.offer');
Route::post('/offer/store', 'Admin\\OfferController@store')->name('offer.store');
Route::post('/offer/update', 'Admin\\OfferController@update')->name('offer.update');
Route::post('/offer/delete', 'Admin\\OfferController@destroy')->name('offer.delete');

// Router Payment
Route::get('/payment', 'Admin\\PaymentController@index')->name('home.payment');
Route::post('/payment/store', 'Admin\\PaymentController@store')->name('payment.store');
Route::post('/payment/update', 'Admin\\PaymentController@update')->name('payment.update');

// Router Pages HR Management

// Rote Department
Route::get('/department', 'Admin\\DepartmentController@index')->name('home.department');
Route::post('/department/store', 'Admin\\DepartmentController@store')->name('department.store');
Route::post('/department/update', 'Admin\\DepartmentController@update')->name('department.update');
Route::post('/department/delete', 'Admin\\DepartmentController@destroy')->name('department.delete');

// Rote Job
Route::get('/description', 'Admin\\DescriptionController@index')->name('home.discription');
Route::post('/description/store', 'Admin\\DescriptionController@store')->name('description.store');
Route::post('/description/update', 'Admin\\DescriptionController@update')->name('description.update');
Route::post('/description/delete', 'Admin\\DescriptionController@destroy')->name('description.delete');

// Route Employees
Route::get('/employees', 'Admin\\EmployeesController@index')->name('home.Employees');
Route::post('/employees/store', 'Admin\\EmployeesController@store')->name('employees.store');
Route::post('/Employees/update', 'Admin\\EmployeesController@update')->name('employees.update');
Route::post('/Employees/delete', 'Admin\\EmployeesController@destroy')->name('employees.delete');