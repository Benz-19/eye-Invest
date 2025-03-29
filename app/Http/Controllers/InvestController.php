<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MessageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InvestController extends Controller
{
    public function processExpense(Request $request)
    {
        if (!Auth::check()) {
            $user = new UserController();
            $user->logoutUser();
        }

        $incomingRequest = $request->validate([
            'period' => ['required'],
            'amount' => ['required'],
            'vendor' => ['required'],
        ]);

        $incomingRequest['vendor'] = htmlspecialchars($incomingRequest['vendor']);

        $user = Auth::User();

        $salaryFetch = DB::table('salary')->select('salary')->where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $salary = $salaryFetch->salary;
        if ($salary === NULL) {
            MessageService::flash('error', 'Create Insert A salary...');
            $userRole = $user->role;
            return view('customer.dashboard', [
                'userRole' => $userRole,
                'salary' => $salary,
            ]);
        }

        try {
            $processExpense = DB::table('invest')->insert([
                'user_id' => $user->id,
                'salary' => $salary,
                'amount' => $incomingRequest['amount'],
                'vendor' => $incomingRequest['vendor'],
                'period' => $incomingRequest['period']
            ]);

            if ($processExpense) {
                MessageService::flash('success', 'Data was uploaded');
                return view('customer.dashboard', [
                    'userRole' => $user->role
                ]);
            }
        } catch (\Exception $error) {
            MessageService::flash('error', 'my error');
            return redirect()->back()->with('error', 'Failed to insert the date... try-catch');
        }
    }
}
