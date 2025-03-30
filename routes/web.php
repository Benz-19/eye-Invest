<?php

use App\Models\Salary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvestController;
use App\Http\Controllers\SalaryController;

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
Route::post('/login-user', [UserController::class, 'loginUser']);
Route::get('/logout', [UserController::class, 'logoutUser']);


// customer Authentication
Route::get('/customer-login', function () {
    session(['userRole' => 'customer']);
    return view('customer.login', ['userRole' => session('userRole')]);
});

Route::get('/customer/dashboard', function () {
    if (!Auth::check()) {
        return redirect('/');
    }

    $userSalary = new SalaryController();
    return view('customer.dashboard', [
        'salary' => $userSalary->getSalary(),
        'userRole' => session('userRole')
    ]);
});
Route::post('/createExpense', [InvestController::class, 'processExpense']);


// Admin Authentication
Route::get('/admin-login', function () {
    session(['userRole' => 'admin']);
    return view('customer.login', ['userRole' => session('userRole')]);
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
