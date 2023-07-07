<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){

        $user = $request->user();

       
        if($user->role == 'admin'){
            return view('admin.dashboard');
        }else{
            return view('customers.show', [
                'user' => $user,
                'investments' => $user->investments()->orderBy('date', 'desc')->get()
            ]);
        }
    }
}
