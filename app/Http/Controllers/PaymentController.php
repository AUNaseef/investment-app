<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Payment::query();

        if ($request->status == 'paid') {
            $query->where('amount', '>', 0);
        } elseif ($request->status == 'unpaid') {
            $query->where('amount', '<=', 0);
        }

        if ($request->due == 'today') {
            $query->whereDate('due_date', Carbon::today()->toDateString());
        }

        if ($request->due == 'old') {
            $query->whereDate('due_date', "<", Carbon::today()->toDateString());
            $query->where('amount', '<=', 0);
        }

        return view('payments.index', [
            'payments' => $query->get()
        ]);
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $values = $request->validate([
            'amount' => 'sometimes|required|numeric',
            'due_date' => 'sometimes|required|date'
        ]);

        $payment->forceFill($values)->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
