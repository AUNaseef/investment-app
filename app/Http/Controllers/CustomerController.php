<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        $query->where('role', 'client');
        $results = [];


        if($request->status == 'approved'){
            $query->where('approved', 1);
        }

        if($request->status == 'unapproved'){
            $query->where('approved', 0);
        }

        // Search in all fields
        if ($request->input('search')) {
            $searchTerm = $request->input('search');
            $results = $query->where(function ($search) use ($searchTerm) {
                $search->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('address', 'like', '%' . $searchTerm . '%');
            })->get();
        }else{
            $results = $query->get();
        }


        return view('customers.index', [
            'customers' => $results
        ]);
    }

    public function show(User $user)
    {
        return view('customers.show', [
            'user' => $user,
            'investments' => $user->investments()->orderBy('date', 'desc')->get(),
            'stats' => [
                'total_investments' => $user->investments->sum('amount'),
                'total_earnings' => $user->payments->sum('amount'),
                'total_earnings_due' => $user->investments->sum('profit')
            ]
        ]);
    }

    public function add_investment(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'profit_percentage' => 'required|numeric'
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

        for ($i = 0; $i < 15; $i++) {
            $date = $date->addDays(30);
            Payment::create([
                'investment_id' =>  $investment->id,
                'amount' => 0,
                'due_date' => $date,
                'paid' => 0
            ]);
        }

        return redirect('/customers/' . $user->id);
    }

    public function approve(User $user){
        $user->forceFill([
            'approved' => '1'
        ])->save();
        return back();
    }

    public function edit(Request $request, User $user){
        return view('profile.edit', ['user' => $user, 'edit_user' => true]);
    }

    public function update(Request $request, User $user){
        $fields = $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone' => ['string', 'max:15'],
            'address' => ['string', 'max:255']
        ]);

        $user->update($fields);
        $user->save();

        return back();
    }

    public function update_password(Request $request, User $user){
        $fields = $request->validateWithBag('updatePassword',[
            'password' => ['required','string', 'min:8', 'confirmed']
        ]);

        $user->forceFill($fields)->save();
        return back();
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('/customers');
    }
}
