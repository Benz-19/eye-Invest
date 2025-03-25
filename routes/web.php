<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});


// process user login
Route::get('/create-user', function () {
    return view('auth.createUser', [
        'userRole' => session('userRole')
    ]);
});
Route::post('/register-user', [UserController::class, 'register']);
Route::get('/login-user', [UserController::class, 'loginUser']);


// customer Authentication
Route::get('/customer-login', function () {
    session(['userRole' => 'customer']);
    return view('customer.login', ['userRole' => session('userRole')]);
});
