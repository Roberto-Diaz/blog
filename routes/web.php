<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/categorias', [CategoryController::class, 'index'])->middleware(['auth'])->name('categories'); 
Route::get('/etiquetas', [TagController::class, 'index'])->middleware(['auth'])->name('tags');              
Route::get('/posts', [PostController::class, 'index'])->middleware(['auth'])->name('posts');                

Route::get('/categorias/crear', [CategoryController::class, 'create'])->middleware(['auth'])->name('categories.create'); 
Route::post('/categorias/store', [CategoryController::class, 'store'])->middleware(['auth'])->name('categories.store');     

Route::get('/etiquetas/crear', [TagController::class, 'create'])->middleware(['auth'])->name('tags.create'); 
Route::post('/etiquetas/store', [TagController::class, 'store'])->middleware(['auth'])->name('tags.store');         

require __DIR__.'/auth.php';
