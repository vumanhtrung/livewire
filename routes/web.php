<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\PostListing;
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

Route::get('location', [LocationController::class, 'index']);
Route::get('test', [TestController::class, 'index']);
Route::get('posts-with-load-more-button', PostListing::class);
