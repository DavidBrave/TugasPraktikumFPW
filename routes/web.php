<?php

use Illuminate\Support\Facades\Redirect;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/tes', 'LoginController@Tes');
Route::get('/', 'LoginController@Index');
Route::post('/', 'LoginController@Login');

Route::get('/login', 'LoginController@Index');
Route::post('/login', 'LoginController@Login');
Route::get('/register', 'LoginController@ShowRegister');
Route::post('/register', 'LoginController@Register');

// Route::any('vendor/{id}', function($id) {
//     'VendorController@VendorID';
// })->name('venid');



Route::group(['prefix' => 'vendor'], function() {
    Route::get('', 'VendorController@VendorList');
    Route::any('/{id}', 'VendorController@VendorId')->name('vendor');

});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/vendor/new', 'AdminController@NewVendor');
    Route::post('/vendor/new', 'AdminController@ConfirmNewVendor');

    Route::get('/users', 'AdminController@AllUser');
    Route::post('/users', 'AdminController@BlockUser');

});

Route::group(['prefix' => 'menu'], function() {
    Route::any('/{id}', 'MenuController@MenuId')->name('user');
    Route::get('/manage', 'MenuController@Manage');
    Route::post('/manage/id', 'MenuController@ManagingId');
    Route::any('/manage/{id}', 'MenuController@ManageId')->name('manage');
});

Route::any('/logout', 'LoginController@Logout');

Route::post('/addtocart', 'CartController@AddToCart');



