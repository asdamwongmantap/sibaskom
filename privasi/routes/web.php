<?php

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
Route::get('/','Logincontroller@index');
Route::post('/ceklogin','Logincontroller@ceklogin');
Route::get('/logout','Logincontroller@logout');
Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard','Maincontroller@index');
});
