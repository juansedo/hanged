<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
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

Route::get('/', GameController::class)
->name('game')
->middleware('auth');

Route::get('/congratulations', [GameController::class, 'win'])
->name('congratulations')
->middleware('auth');

Route::get('/failed', [GameController::class, 'fail'])
->name('failed')
->middleware('auth');

Auth::routes();

Route::view('/game/reg','auth.reg');