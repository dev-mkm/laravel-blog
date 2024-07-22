<?php

use App\Http\Middleware\IsAdmin;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Users\UserList;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', IsAdmin::class])->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('categories', Panel::class)->name('categories');
    Route::get('users', UserList::class)->name('users');
});
