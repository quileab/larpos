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
Route::resource('clients', 'ClientController',['except'=>['show']]);
Route::get('/clients/search', 'ClientController@search')->name('clients.search');
Route::get('/clients/select/{id}', 'ClientController@select')->name('clients.select');
Route::get('/clients/deselect', 'ClientController@deselect')->name('clients.deselect');

Route::resource('invoices', 'InvoiceController',['except'=>['show']]);
Route::get('/invoices/search', 'InvoiceController@search')->name('invoices.search');
Route::get('/invoices/productssearch', 'InvoiceController@productssearch')->name('invoices.productssearch');
Route::post('/invoices/addtocart', 'InvoiceController@addtocart')->name('invoices.addtocart');
Route::get('/invoices/removefromcart/{id}', 'InvoiceController@removefromcart')->name('invoices.removefromcart');
Route::get('/invoices/cleancart', 'InvoiceController@cleancart')->name('invoices.cleancart');

Route::resource('products', 'ProductController',['except'=>['show']]);
Route::get('/products/search', 'ProductController@search')->name('products.search');
Route::get('/products/create', 'ProductController@create')->name('products.create');

Route::get('/wareselect/{id}', 'WarehouseController@wareselect')->name('wareselect');
Route::get('/waredeselect', 'WarehouseController@waredeselect')->name('waredeselect');

Route::get('/prodqtys', 'WhprodquantityController@index')->name('prodqtys');

Route::resource('whprodquantities', 'WhprodquantityController',['except'=>['show']]);
//Route::post('/whprodquantities/store','WhprodquantityController@store')->name('whprodquantities.store');
//Route::put('/whprodquantities/update','WhprodquantityController@update')->name('whprodquantities.update');

/*
Route::resource('products', 'ProductsController', [
    'only' => ['index', 'create', 'store']
]);

Route::resource('products', 'ProductsController', [
    'except' => [ 'show' ]
]);
*/