<?php

use App\Http\Controllers\admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\admin\BookController as AdminBookController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PublishingCompanyController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', BookController::class . '@index')->name('home');
Route::get('/category/{id}', CategoryController::class . "@index")->name('category-book');
Route::get('/book/{id}', BookController::class . '@detail')->name('detail-book');
Route::get('/author/{id}', AuthorController::class . '@author')->name('author-book');
Route::prefix('auth')->group(function () {
    Route::get('/login', AuthController::class . '@login')->name('login');
    Route::post('/login', AuthController::class . '@handleLogin')->name('handle-login');
    Route::post('/register', AuthController::class . '@handleRegister')->name('handle-register');
    Route::get('/register', AuthController::class . '@register')->name('register');
    Route::get('/logout', AuthController::class . '@logout')->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', DashboardController::class . '@index')->name("admin.dashboard");
    Route::prefix('books')->group(function () {
        Route::get('/', AdminBookController::class . '@index')->name("admin.books");
        Route::get('/add', AdminBookController::class . '@create')->name("admin.book.add");
        Route::post('/add', AdminBookController::class . '@store')->name("admin.book.add-handle");
        Route::get('/edit/{id}', AdminBookController::class . '@edit')->name("admin.book.edit");
        Route::post('/edit/{id}', AdminBookController::class . '@update')->name("admin.book.edit-handle");
        Route::delete('/{id}', AdminBookController::class . '@destroy')->name("admin.book.delete");
    });
    Route::prefix('users')->group(function () {
        Route::get('/', UserController::class . '@index')->name("admin.users");
        Route::get('/add', UserController::class . '@create')->name("admin.user.add");
        Route::post('/add', UserController::class . '@store')->name("admin.user.add-handle");
        Route::get('/edit/{id}', UserController::class . '@edit')->name("admin.user.edit");
        Route::post('/edit/{id}', UserController::class . '@update')->name("admin.user.edit-handle");
        Route::delete('/{id}', UserController::class . '@destroy')->name("admin.user.delete");
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', AdminCategoryController::class . '@index')->name("admin.categories");
        Route::get('/add', AdminCategoryController::class . '@create')->name("admin.category.add");
        Route::post('/add', AdminCategoryController::class . '@store')->name("admin.category.add-handle");
        Route::get('/edit/{id}', AdminCategoryController::class . '@edit')->name("admin.category.edit");
        Route::post('/edit/{id}', AdminCategoryController::class . '@update')->name("admin.category.edit-handle");
        Route::delete('/{id}', AdminCategoryController::class . '@destroy')->name("admin.category.delete");
    });
    Route::prefix('authors')->group(function () {
        Route::get('/', AdminAuthorController::class . '@index')->name("admin.authors");
        Route::get('/add', AdminAuthorController::class . '@create')->name("admin.author.add");
        Route::post('/add', AdminAuthorController::class . '@store')->name("admin.author.add-handle");
        Route::get('/edit/{id}', AdminAuthorController::class . '@edit')->name("admin.author.edit");
        Route::post('/edit/{id}', AdminAuthorController::class . '@update')->name("admin.author.edit-handle");
        Route::delete('/{id}', AdminAuthorController::class . '@destroy')->name("admin.author.delete");
    });
    Route::prefix('publishing-companies')->group(function () {
        Route::get('/', PublishingCompanyController::class . '@index')->name("admin.publishing_companies");
        Route::get('/add', PublishingCompanyController::class . '@create')->name("admin.publishing_company.add");
        Route::post('/add', PublishingCompanyController::class . '@store')->name("admin.publishing_company.add-handle");
        Route::get('/edit/{id}', PublishingCompanyController::class . '@edit')->name("admin.publishing_company.edit");
        Route::post('/edit/{id}', PublishingCompanyController::class . '@update')->name("admin.publishing_company.edit-handle");
        Route::delete('/{id}', PublishingCompanyController::class . '@destroy')->name("admin.publishing_company.delete");
    });
});
