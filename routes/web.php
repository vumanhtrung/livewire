<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\InfinitePostListing;
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

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('location', [LocationController::class, 'index'])->name('multi-level-select');
Route::get('posts-with-load-more-button', PostListing::class)->name('load-more-button');
Route::get('posts-with-infinite-pagination', InfinitePostListing::class)->name('infinite-pagination');
Route::get('test', [TestController::class, 'index']);
