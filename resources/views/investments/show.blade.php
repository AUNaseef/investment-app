@php
$isAdmin = Auth::user()->role == 'admin'
@endphp
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-bold text-lg mb-10">Investment Details</h2>

                <div class="mb-10 grid grid-cols-3 gap-5 mt-5 lg:grid-cols-1">
                    <!-- Total Investment -->
                    <div class="card col-span-1">
                        <div class="card-body">
                            <h5 class="uppercase text-xs tracking-wider font-extrabold">Total Investment</h5>
                            <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3"></span>{{$investment->amount}}</span></h1>
                        </div>
                    </div>

                    <!-- Profit Percentage -->
                    <div class="card col-span-1">
                        <div class="card-body">
                            <h5 class="uppercase text-xs tracking-wider font-extrabold">Profit Percentage</h5>
                            <h1 class="capitalize text-lg mt-1 mb-1">{{$investment->profit_percentage}}</span></h1>
                        </div>
                    </div>

                    <!-- Amount Due -->
                    <div class="card col-span-1">
                        <div class="card-body">
                            <h5 class="uppercase text-xs tracking-wider font-extrabold">Amount Due</h5>
                            <h1 class="capitalize text-lg mt-1 mb-1">$<span class="num-3"></span><span>{{($investment->amount * $investment->profit_percentage) - $sum}}</span></h1>
                        </div>
                    </div>
                </div>
                <x-payment-table :payments="$payments"/>
            </div>
        </div>
    </div>
</x-app-layout>