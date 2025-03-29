<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function updateSalary()
    {
        //
    }
    public function getSalary()
    {
        $user = Auth::User();
        $getSalary = DB::table('salary')->select('salary')->where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        return $getSalary->salary;
    }
}
