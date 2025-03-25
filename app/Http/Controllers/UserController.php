<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $user = Auth::create($incomingRequest);

        if ($user) {
        }
    }
}
