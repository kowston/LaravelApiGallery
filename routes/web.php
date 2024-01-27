<?php

use App\Http\Controllers\Admin\Gallery\AlbumsController;
use App\Http\Controllers\Admin\Gallery\ImagesController;
use App\Http\Controllers\Admin\Gallery\TagsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('pages/test1', [PagesController::class, 'test1']);
Route::get('pages/test2', [PagesController::class, 'test2']);
Route::get('pages/test3', [PagesController::class, 'test3']);
Route::get('pages/test4', [PagesController::class, 'test4']);

Route::get('message', [LearningController::class, 'index'])->name('message.index');
Route::post('message', [LearningController::class, 'store'])->name('message.store');
Route::get('numbers', [LearningController::class, 'indexNumbers'])->name('numbers.indexNumbers');
Route::post('numbers', [LearningController::class, 'storeNumbers'])->name('numbers.storeNumbers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('gallery/albums', AlbumsController::class);
    Route::resource('gallery/albums.images', ImagesController::class);
    Route::resource('gallery/tags', TagsController::class);
});

require __DIR__.'/auth.php';
