<?php

use App\Models\User;

Route::get('/', function () {
    return view('welcome', [
        'users' => User::all()
    ]);
});
