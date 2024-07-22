<?php

use App\Http\Middleware\IsAdmin;
use App\Livewire\Admin\Categories\CategoryList;
use App\Livewire\Admin\Users\UserList;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', IsAdmin::class])->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('categories', CategoryList::class)->name('categories');
    Route::get('users', UserList::class)->name('users');
    Route::get('users/{user}', Dashboard::class)->name('user');
});
