<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;

class DashboardController extends Controller
{
    public function RemainingPayment()
    {
        $investments = Investment::all();
        $total_owed = 0;
        $total_paid = 0;
        foreach ($investments as $investment){
            $total_owed += $investment->amount * $investment->profit_percentage;
            $total_paid += $investment->payments->sum('amount');
        }

        return  $total_owed - $total_paid;
    }

    public function index(Request $request){

        $user = $request->user();
        $today = Carbon::today()->subDays(7);

        if($user->role == 'admin'){
            $data = [
             'total_investments' => Investment::sum('amount'),
             'total_investments_lastweek' => Investment::whereDate('date', '>', $today->toDateString())->sum('amount'),
             'total_due' => $this->RemainingPayment(),
             'user_count' => User::where('role', 'client')->where('approved', '1')->count(),
             'unapproved_users' => User::where('role', 'client')->where('approved', '0')->count(),
            ];
            return view('admin.dashboard', compact('data'));
        }else{
            return view('customers.show', [
                'user' => $user,
                'investments' => $user->investments()->orderBy('date', 'desc')->get()
            ]);
        }
    }
}
