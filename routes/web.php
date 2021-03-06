<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// routes() creates all needed CRUD routes for Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
