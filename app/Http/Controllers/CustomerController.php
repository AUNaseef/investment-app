<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        return view('customers.index', [
            'customers' => User::where('role', 'client')->get()
        ]);
    }

    public function show(User $user)
    {
        return view('customers.show', [
            'user' => $user,
            'investments' => $user->investments()->orderBy('date', 'desc')->get()
        ]);
    }

    public function add_investment(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'profit_percentage' => 'required'
        ]);

        $admin = Auth::user();
        $amount = $request->amount;
        $date = $request->date;
        $profit_percentage = $request->profit_percentage;

        $date = Carbon::createFromFormat('Y-m-d', $date);

        $investment = Investment::create([
            'admin_id' => $admin->id,
            'user_id' => $user->id,
            'amount' => $amount,
            'date' => $date,
            'profit_percentage' => $profit_percentage
        ]);

        for ($i = 0; $i <= 15; $i++) {
            Payment::create([
                'investment_id' =>  $investment->id,
                'amount' => 0,
                'due_date' => $date,
                'paid' => 0
            ]);
            $date = $date->addDays(30);
        }

        return redirect('/customers/' . $user->id);
    }

    public function approve(User $user){
        $user->forceFill([
            'approved' => '1'
        ])->save();
        return back();
    }
}
