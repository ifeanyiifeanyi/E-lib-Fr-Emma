<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware('auth')->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('logout','logout')->name('admin.logout');
    });


    Route::controller(CategoryController::class)->group(function () {
        Route::get('category','index')->name('admin.category.index');
        Route::post('create/category', 'store')->name('admin.category.store');
        Route::get('create/{category}/edit', 'edit')->name('admin.category.edit');
        Route::post('create/{category}/update', 'update')->name('admin.category.update');
        Route::get('create/{category}/delete', 'destroy')->name('admin.category.delete');
    });


    Route::controller(TagController::class)->group(function(){
        Route::get('tags', 'index')->name('admin.tag.view');
        Route::post('tags/create', 'store')->name('admin.tag.store');
        Route::get('tags/delete/{tag}', 'destroy')->name('admin.tag.delete');
    });

    Route::controller(GenreController::class)->group(function(){
        Route::get('genre', 'index')->name('admin.genre.view');
        Route::post('genre/create', 'store')->name('admin.genre.store');
        Route::get('genre/delete/{genre}', 'destroy')->name('admin.genre.delete');
    });


    Route::controller(BookController::class)->group(function(){
        Route::get('manage-books', 'index')->name('admin.book.view');
        Route::get('create-book', 'create')->name('admin.book.create');
        Route::post('create-book/store', 'store')->name('admin.book.store');
        Route::get('edit-book/edit/{book:slug}', 'edit')->name('admin.book.edit');
        Route::get('edit-book/show/{book:slug}', 'show')->name('admin.book.show');
        Route::post('edit-book/update/{book:slug}', 'update')->name('admin.book.update');
        Route::get('edit-book/delete/{book:slug}', 'destroy')->name('admin.book.destroy');

    });
});


Route::prefix('member')->middleware(['auth', 'role:member'])->group(function () {
    Route::controller(MemberDashboardController::class)->group(function () {
        Route::get('dashboard','dashboard')->name('member.dashboard');
    });
});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
