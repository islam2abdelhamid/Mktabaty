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
// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth']);

Auth::routes();

Route::get('admin', 'AdminController@listAdmins')->name('listUsers')->middleware('can:view,App\User');
Route::get('admin/users', 'AdminController@listUsers')->name('listUsers')->middleware('can:view,App\User');
Route::get('admin/admins', 'AdminController@listAdmins')->name('listAdmins')->middleware('can:view,App\User');
Route::get('admin/dashboard', 'AdminController@index')->name('dashboard')->middleware('can:view,App\User');
Route::get('admin/change/{id}', 'AdminController@ChangeActiveState')->name('ChangeActiveState')->middleware('can:view,App\User');
Route::get('admin/deleteUser/{id}', 'AdminController@destroy')->name('destroy')->middleware('can:view,App\User');

//Route::get('/', 'Admin\BookController@index')->middleware('can:view,App\User'); repeated and un used route


Route::get('/favorites', function () {
    return view('mktabaty.pages.books.favorites');
})->middleware(['auth']);


Route::get('/books', function () {
    return view('mktabaty.pages.books.user-books');
});


Route::get('/book', function () {
    return view('mktabaty.pages.books.book');
});

Route::prefix('admin')->group(function () {
    Route::resource('books', 'Admin\BookController')->middleware('can:view,App\User');

    Route::resource('category', 'Admin\CategoryController')->middleware('can:view,App\User');
    Route::resource('cat', 'Admin\CategoryController')->middleware('can:view,App\User');
    Route::resource('books', 'Admin\BookController')->middleware('can:view,App\User');
});

Route::resource('books', 'Admin\BookController')->middleware('can:view,App\User');


Route::get('/getBooks/{id}/', 'Admin\BookController@categoryBooks')->name('getBooks')->middleware('can:view,App\User');
Route::get('/', 'Admin\BookController@webBooks');
Route::post('book/{id}', 'BookLeaseController@makeLease')->name('bookLease');

