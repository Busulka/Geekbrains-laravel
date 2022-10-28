<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\CategoriesController;
use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;



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

Route::view('/vue', 'vue')->name('vue');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('one/{id}', [NewsController::class, 'show'])->name('show');
        Route::name('category.')
            ->group(function () {
                Route::get('categories', [CategoriesController::class, 'index'])->name('index');
                Route::get('category/{slug}', [CategoriesController::class, 'show'])->name('show');
            });
    });



Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [AdminNewsController::class, 'create'])->name('create');
        Route::match(['get', 'post'], '/edit/{news}', [AdminNewsController::class, 'edit'])->name('edit');
        Route::match(['get', 'post'], '/export', [AdminNewsController::class, 'export'])->name('export');
        Route::post('/update/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::get('/destroy', [AdminNewsController::class, 'destroy'])->name('destroy');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
        Route::name('category.')
            ->group(function () {
                Route::get('/category', [AdminIndexController::class, 'categoryIndex'])->name('index');
                Route::match(['get', 'post'],'/category/create', [AdminCategoryController::class, 'create'])->name('create');
                Route::get('/category/edit/{category}',[AdminCategoryController::class, 'edit'])->name('edit');
                Route::post('/category/update/{category}',[AdminCategoryController::class, 'update'])->name('update');
                Route::get('/category/destroy',[AdminCategoryController::class, 'destroy'])->name('destroy');
            });
    });


Route::view('/about', 'about')->name('about');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
