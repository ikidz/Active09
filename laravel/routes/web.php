<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', [ArticleController::class, 'aboutus'])->name('article.aboutus');

Route::name('article.')->prefix('/articles')->group(function(){
	Route::get('/', [ArticleController::class, 'index'])->name('index');
	Route::get('/info/{id}', [ArticleController::class, 'info'])->where('id', '[0-9]+')->name('info');
});

Route::name('service.')->prefix('/services')->group(function(){
	Route::get('/{id?}', [ArticleController::class, 'services'])->where('id', '[0-9]+')->name('index');
	Route::get('/info/{id}', [ArticleController::class, 'service_info'])->where('id', '[0-9]+')->name('info');
});

Route::name('project.')->prefix('/projects')->group(function(){
	Route::get('/', [ProjectController::class, 'index'])->name('index');
	Route::get('/{id}', [ProjectController::class, 'info'])->name('info');
});

Route::name('product.')->prefix('/products')->group(function(){
	/*
	Route::get('/', [ProductController::class, 'index'])->name('index');
	Route::get('/{id}', [ProductController::class, 'info'])->name('info');
	*/
	Route::get('/', [ProjectController::class, 'index'])->name('index');
	Route::get('/{id}', [ProjectController::class, 'info'])->name('info');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'saveContact'])->name('contact.submit');