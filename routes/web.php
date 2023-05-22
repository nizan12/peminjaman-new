<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/alat', [ToolController::class, 'index'])->name('tool-all');
Route::get('/details/{id?}', [DetailController::class, 'index'])->name('detail-tool');


Route::resource('banner', BannerController::class);
Route::resource('category', CategoryController::class);
Route::resource('course', CourseController::class);
Route::resource('lecture', LectureController::class);
Route::resource('room', RoomController::class);
Route::resource('product', ProductController::class);
Route::resource('product-gallery', ProductGalleryController::class);
Route::resource('schedule', ScheduleController::class);
Route::resource('user', UserController::class);

Route::get('/list-ruangan', [RoomController::class, 'list_ruangan'])->name('list-ruangan');

Route::resource('class', ClassController::class);
