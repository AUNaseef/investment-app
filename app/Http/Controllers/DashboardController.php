<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){

        $user = $request->user();

        if($user->role == 'admin'){
            $total_investments = Investment::sum('amount');
            $user_count = User::where('role', 'client')->count();
            // dd($total_payment);
            return view('admin.dashboard');
        }else{
            return view('customers.show', [
                'user' => $user,
                'investments' => $user->investments()->orderBy('date', 'desc')->get()
            ]);
        }
    }
}
