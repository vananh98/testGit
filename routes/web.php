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

Route::get('/', function () {
    return view('welcome');
});
Route::get('bbbbb');
Route::get('testMerge');
Route::get('mergeBranch');
Route::get('mergeBranch');
Route::resource('anhmv', 'testApi');
<<<<<<< HEAD
<<<<<<< Updated upstream
Route::get('anhmsdssds');
=======
Route::get('1');
Route::get('12s2s5sd465fgh');
>>>>>>> Stashed changes
=======
Route::get('12s2s5sd465fgh);
>>>>>>> f0d0f52c560301ac539c56eff7845163e79d9821
