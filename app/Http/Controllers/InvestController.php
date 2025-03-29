<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestController extends Controller
{
    public function updateSalary()
    {
        //
    }

    public function processExpense(Request $request)
    {
        $incomingRequest = $request->validate([
            'period' => ['required'],
            'amount' => ['required'],
            'vendor' => ['required'],
        ]);
    }
}
