<?php

use App\Models\Post;
use App\Models\User;

Route::get('/', function () {
    return view('welcome', [
        'users' => User::all(),
        'posts' => Post::all(),
    ]);
});

Route::get('/post/{post}', function (Post $post) {
    return view('post.show', [
        'post' => $post,
    ]);
})->name('post.show');

Route::get('/post/{post}/edit', function (Post $post) {
    return view('post.edit', [
        'post' => $post,
    ]);
})->name('post.edit');
