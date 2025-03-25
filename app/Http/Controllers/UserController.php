<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingRequest = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $incomingRequest['name'] = htmlspecialchars($incomingRequest['name']);
        $incomingRequest['email'] = htmlspecialchars($incomingRequest['email']);
        $incomingRequest['password'] = htmlspecialchars($incomingRequest['password']);

        $user = User::create($incomingRequest);

        if ($user) {
            MessageService::flash('success', 'Account was created successfully...');
            return view('auth.createUser', [
                'userRole' => session('userRole')
            ]);
        } else {
            MessageService::flash('error', 'Failed to create this account!!!');
            return view('auth.createUser', [
                'userRole' => session('userRole')
            ]);
        }
    }

    public function loginUser(Request $request)
    {
        $incomingRequest = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $incomingRequest['email'] = htmlspecialchars($incomingRequest['email']);
        $incomingRequest['password'] = htmlspecialchars($incomingRequest['password']);

        if (User::attempt(['email' => $incomingRequest['email'], 'password' => $incomingRequest['password']])) {
            if ($incomingRequest['role'] === 'customer') {
                return view('customer.dashboard');
            } elseif ($incomingRequest['role'] === 'admin') {
                return view('admin.dashboard');
            } else {
                return redirect('/');
            }
        }
    }
}
