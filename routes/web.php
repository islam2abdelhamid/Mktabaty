<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


//Route::get('/', function () {
//return view('mktabaty.pages.books.index');
//});

//Route::get('/', 'Admin\BookController@index');

Route::get('bookSearch', 'Admin\BookController@search');


Route::get('/favorites', function () {
    return view('mktabaty.pages.books.favorites');
})->middleware(['auth']);
// Route::get('/deleteUser/{id}', 'AdminController@destroy')->name('destroy')->middleware('can:view,App\User');


// Route::prefix('admin')->group(function () {

//     Route::get('/', 'AdminController@index')->name('listUsers');
//     Route::get('/dashboard', 'AdminController@index')->name('dashboard');
//     Route::get('/admins', 'AdminController@listAdmins')->name('listAdmins');
//     Route::get('/users', 'AdminController@listUsers')->name('listUsers');
//     Route::get('/change/{id}', 'AdminController@ChangeActiveState')->name('ChangeActiveState');
//     Route::get('/deleteUser/{id}', 'AdminController@destroy')->name('destroy');
//     Route::post('admin/addAdmin', 'AdminController@store')->name('addAdmin');
//     Route::get('admin/{admin}/edit', 'AdminController@edit')->name('admin.edit');
//     Route::post('admin/{admin}', 'AdminController@update')->name('admin.update');
//     Route::resource('books', 'Admin\BookController')->middleware('can:view,App\User');
//     Route::resource('category', 'Admin\CategoryController')->middleware('can:view,App\User');
// });


Route::group(['middleware' => ['can:view,App\User'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/admins', 'AdminController@listAdmins')->name('listAdmins');
    Route::get('/users', 'AdminController@listUsers')->name('listUsers');
    Route::get('/change/{id}', 'AdminController@ChangeActiveState')->name('ChangeActiveState');
    Route::get('/deleteUser/{id}', 'AdminController@destroy')->name('destroy');
    Route::post('admin/addAdmin', 'AdminController@store')->name('addAdmin');
    Route::get('admin/{admin}/edit', 'AdminController@edit')->name('admin.edit');
    Route::post('admin/{admin}', 'AdminController@update')->name('admin.update');
    Route::resource('books', 'Admin\BookController')->middleware('can:view,App\User');
    Route::resource('category', 'Admin\CategoryController')->middleware('can:view,App\User');
});

Route::get('/getBooks/{id}/', 'Admin\BookController@categoryBooks')->name('getBooks');
Route::get('/', 'Admin\BookController@webBooks');
Route::post('comment/{id}', 'User\CommentController@store')->name('comment');
Route::post('fav/{id}', 'FavouriteController@store')->name('fav');
Route::get('/favorites', 'FavouriteController@index');


Route::get('mybooks/', function () {
    return view('mktabaty.pages.books.user-books');
});
Route::get('books/{id}', 'Admin\BookController@show')->name('showBook');
Route::post('books/{id}', 'BookLeaseController@makeLease')->name('bookLease');

Route::get('user/{user}/edit', 'User\ProfileController@edit')->name('user.edit');
Route::post('user/{user}', 'User\ProfileController@update')->name('user.update');
