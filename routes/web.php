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
Route::get('/publicaciones', [PostController::class, 'index'])->middleware(['auth'])->name('posts');                

Route::get('/categorias/crear', [CategoryController::class, 'create'])->middleware(['auth'])->name('categories.create'); 
Route::post('/categorias/store', [CategoryController::class, 'store'])->middleware(['auth'])->name('categories.store');     

Route::get('/etiquetas/crear', [TagController::class, 'create'])->middleware(['auth'])->name('tags.create'); 
Route::post('/etiquetas/store', [TagController::class, 'store'])->middleware(['auth'])->name('tags.store');         

Route::get('/publicaciones/crear', [PostController::class, 'create'])->middleware(['auth'])->name('posts.create'); 
Route::post('/publicaciones/store', [PostController::class, 'store'])->middleware(['auth'])->name('posts.store');         

Route::get('/categorias/eliminar/{id}', [CategoryController::class, 'destroy'])->middleware(['auth'])->name('categories.destroy'); 
Route::get('/etiquetas/eliminar/{id}', [TagController::class, 'destroy'])->middleware(['auth'])->name('tags.destroy');  
Route::get('/publicaciones/eliminar/{id}', [PostController::class, 'destroy'])->middleware(['auth'])->name('posts.destroy');  


Route::get('/categorias/editar/{id}', [CategoryController::class, 'edit'])->middleware(['auth'])->name('categories.edit');   
Route::post('/categorias/modificar/{id}', [CategoryController::class, 'update'])->middleware(['auth'])->name('categories.update');          

Route::get('/etiquetas/editar/{id}', [TagController::class, 'edit'])->middleware(['auth'])->name('tags.edit');   
Route::post('/etiquetas/modificar/{id}', [TagController::class, 'update'])->middleware(['auth'])->name('tags.update');  

Route::get('/publicaciones/editar/{id}', [PostController::class, 'edit'])->middleware(['auth'])->name('posts.edit');   
Route::post('/publicaciones/modificar/{id}', [PostController::class, 'update'])->middleware(['auth'])->name('posts.update');          
        
        

require __DIR__.'/auth.php';
