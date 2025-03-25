<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});


// process user login
Route::get('/customer-login', function () {
    session(['userRole' => 'customer']);
    return view('customer.login', ['userRole' => session('userRole')]);
});

Route::get('/create-user', function () {
    return view('auth.createUser', [
        'userRole' => session('userRole')
    ]);
});
