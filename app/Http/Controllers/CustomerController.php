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
    public function index(Request $request){
        return view('customers.index');
    }

    public function show(User $user){
        return view('customers.show', ['user' => $user]);
    }
    public function saveinvestmentinfo(Request $request ,User $user){

        $loggedinuser = Auth::user();
        $date = $request->date;
        $amount = $request->amount;
        $profit_percentage = $request->profit_percentage;



        $investment = Investment::create([
            'admin_id' => $loggedinuser->id,
            'user_id' => $user->id,
            'date' => $date,
            'amount' => $amount,
            'profit_percentage' => $profit_percentage,
        ]);
        $date = Carbon::createFromFormat('Y-m-d', $date);

        for ($i=0; $i < 5; $i++) { 

           $payment = Payment::create([
            'investment_id' =>  $investment->id,
            'amount' => 0,
            'due_date' => $date,
            'paid' => 0
        ]);
            $date = $date->addDays(30);
            //dd($date);
       }


        return view('customers.show', ['user' => $user]);
    }
}
