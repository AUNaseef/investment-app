<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Investment $investment)
    {
        $user = Auth::user();
        $payments = $investment->payments()->get();
        $sum = $investment->payments->sum('amount');

        if($user->role == 'admin' || $investment->user_id == $user->id){
            return view('investments.show', compact('investment', 'payments', 'sum'));
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investment $investment)
    {
        $values = [
            'amount' => $request->amount,
            'profit_percentage' => $request->profit_percentage,
            'date' => $request->date
        ];
        $investment->forceFill($values)->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        $investment->delete();
        return back();
    }
}
