<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// routes() creates all needed CRUD routes for Auth
Auth::routes();

Route::get('/dashboard', 'DashController@index')->name('dashboard');

// the next Route will handle
// Permissions in App\Http\Controller\Admin\UserController
// except for...
/*
Route::resource(
    '/admin/users', //admin 'namespace'
    'Admin\UsersController',
    ['except' => ['show', 'create', 'store']]
);
*/
// replaces the namespace(s) from *previous* declaration
// all the Routes inside will have Namespaces & Prefixes auto-applied
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource(
        '/users',
        'UsersController',
        ['except' => ['show', 'create', 'store']]
    );
});

Route::resource('warehouses', 'WarehouseController');
Route::resource('clients', 'ClientController');
Route::resource('products', 'ProductController');

Route::get('/wareselect/{id}', 'WarehouseController@wareselect')->name('wareselect');
Route::get('/waredeselect', 'WarehouseController@waredeselect')->name('waredeselect');

Route::get('/prodqtys', 'WhprodquantityController@index')->name('prodqtys');
