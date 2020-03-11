


<?php

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
    return view('mktabaty.pages.books.index');
});

Route::get('/favorites', function () {
    return view('mktabaty.pages.books.favorites');
});


Route::get('/books', function () {
    return view('mktabaty.pages.books.user-books');
});


Route::get('/book', function () {
    return view('mktabaty.pages.books.book');
});

Route::get('/login', function () {
    return view('mktabaty.pages.user.login');
});


Route::get('/register', function () {
    return view('mktabaty.pages.user.register');
});


Route::get('/admin', function () {
    return view('dashboard.pages.admins');
});

Route::get('/admin/cat', function () {
    return view('dashboard.pages.books');
});

Route::get('/admin/books', function () {
    return view('dashboard.pages.index');
});

Route::get('/admin/users', function () {
    return view('dashboard.pages.users');
});

Route::prefix('admin')->group(function () {
    Route::resource('categories', 'Admin\CategoryController');
});
