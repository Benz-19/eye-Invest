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

        if (Auth::attempt(['email' => $incomingRequest['email'], 'password' => $incomingRequest['password']])) {
            if ($incomingRequest['role'] === 'customer') {
                return redirect('/customer/dashboard');
            } elseif ($incomingRequest['role'] === 'admin') {
                return view('admin.dashboard');
            } else {
                return redirect('/');
            }
        }
    }

    public function logoutUser()
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $userRole = session('userRole');
        Auth::logout();
        session()->flush();
        session()->invalidate();
        if ($userRole) {
            return redirect("/{$userRole}-login")->withHeaders([
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma' => 'no-cache',
                'Expires' => 'Sat,  01 Jan 2000 00:00:00 GMT',
            ]);
        }
        return redirect('/');
    }
}
