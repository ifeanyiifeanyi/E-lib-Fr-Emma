<?php

use App\Http\Controllers\Admin\ActivationCodeController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MembersManagementController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\MemberProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth/login');
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

    Route::controller(ActivationCodeController::class)->group(function(){
        Route::get('manage-activation-code', 'index')->name('admin.activationCode.view');
        Route::get('create-new-code', 'create')->name('admin.activationCode.create');
        Route::post('create-new-code/store', 'store')->name('admin.activationCode.store');
        Route::get('create-new-code/delete/{code:serial_number}', 'destroy')->name('admin.activationCode.delete');

        Route::get('view-code-details/{code:serial_code}', 'codeDetails')->name('admin.activationCode.details');
    });

    Route::controller(MembersManagementController::class)->group(function(){
        Route::get('members', 'index')->name('admin.members.view');
        Route::get('members/{member:username}', 'show')->name('admin.members.show');
        Route::get('members/{member:username}/verify', 'verify')->name('admin.members.verify');
        Route::get('members/{member:username}/deactivate', 'deactivate')->name('admin.members.deactivate');
        Route::get('members/{member:username}/set-code', 'setCode')->name('admin.members.setCode');
        Route::post('members/StoreMangedCode', 'StoreMangedCode')->name('admin.members.StoreMangedCode');


        Route::get('members/{member:username}/delete', 'destroy')->name('admin.members.delete');
    });


    Route::controller(AdminProfileController::class)->group(function(){
        Route::get('profile', 'index')->name('admin.profile.view');
        Route::get('profile/reset-password', 'create')->name('admin.profile.updatePassword');
        Route::post('profile/update-password', 'updatePasswordStore')->name('admin.profile.updatePasswordStore');
        Route::post('profile/update', 'store')->name('admin.profile.store');
    });
});


Route::prefix('member')->middleware(['auth', 'role:member'])->group(function () {
    Route::controller(MemberDashboardController::class)->group(function () {
        Route::get('dashboard','dashboard')->name('member.dashboard');
        Route::get('book-details/{slug}','bookDetails')->name('member.bookDetails.view');
        Route::get('/book/{slug}/file', 'file')->name('book.file');

        Route::get('logout','logout')->name('member.logout');
    });

    Route::controller(MemberProfileController::class)->group(function () {
        Route::get('profile','index')->name('member.profile.view');
        Route::get('profile/update-password','updatePassword')->name('member.updatePassword.view');
        Route::post('update/profile', 'update')->name('member.profile.update');
        Route::post('profile/update-password', 'updatePasswordStore')->name('member.updatePassword.store');
    });
});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
