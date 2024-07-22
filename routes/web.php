<?php

use App\Livewire\Dashboard;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\PostList;
use App\Livewire\Posts\ShowPost;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', Dashboard::class)->name('index');
    Route::get('/create-post', CreatePost::class)->name('create-post');
    Route::get('/edit-post/{post}', CreatePost::class)->name('edit-post');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/posts', PostList::class)->name('posts-list');
Route::get('/cat/{category}', PostList::class)->name('cat-posts');
Route::get('/author/{user}', PostList::class)->name('author-posts');
Route::get('/posts/{post}', ShowPost::class)->name('view-post');;

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
