<?php

use App\Livewire\Posts\ShowPost;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/posts/{post}', ShowPost::class);

require __DIR__.'/auth.php';
