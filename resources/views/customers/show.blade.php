@php
    $isAdmin = Auth::user()->role == 'admin' && !request()->has('asUser')
@endphp
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <div class="justify-between content-center flex gap-10">
                <h2 class="font-bold text-lg mb-5 pt-2">@if($isAdmin){{$user->name}}'s @else Your @endif Profile</h2>
                @if($isAdmin)
                    <div>
                    <a href="/customers/{{$user->id}}/delete"><button class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 rounded">Delete User</button> </a>
                    <a href="/customers/{{$user->id}}/edit"><button class="bg-orange-500 hover:bg-orange-700 text-white font-bold px-4 rounded">Edit User</button> </a>
                    <a href="/customers/{{$user->id}}?asUser"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded">View As User</button> </a>
                    </div>
                @endif
                </div>
                <div class="mb-5 grid grid-cols-3 gap-5 mt-5 lg:grid-cols-1">
                    <!-- Total Investment -->
                    <div class="card card-investment col-span-1 text-center rounded-lg">
                        <div class="card-body">
                            <h5 class="uppercase text-sm tracking-wider">Total Investments</h5>
                            <h1 class="capitalize text-2xl mt-1 mb-1">LKR <span class="num-3"></span>@if (isset($stats['total_investments'])){{$stats['total_investments']}} @else 0 @endif</span></h1>
                        </div>
                    </div>

                    <!-- Total Earnings -->
                    <div class="card card-investment col-span-1 text-center rounded-lg">
                        <div class="card-body">
                            <h5 class="uppercase text-sm tracking-wider">Total Earnings</h5>
                            <h1 class="capitalize text-2xl mt-1 mb-1">LKR <span>@if (isset($stats['total_earnings'])){{$stats['total_earnings']}} @else 0 @endif</span></h1>
                        </div>
                    </div>

                    <!-- Earnings Due -->
                    <div class="card card-investment col-span-1 text-center rounded-lg">
                        <div class="card-body">
                            <h5 class="uppercase text-sm tracking-wider">Earnings Due</h5>
                            <h1 class="capitalize text-2xl mt-1 mb-1">LKR <span>@if (isset($stats['total_earnings_due'])){{$stats['total_earnings_due']}} @else 0 @endif</span></h1>
                        </div>
                    </div>
                </div>

                @if($isAdmin)
                @if ($errors->any())
                    <div class="alert alert-error mb-2">
                        @foreach ($errors->all() as $error)
                         <p class="text-red-500">{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="/customers/{{$user->id}}/add-investment" class="flex gap-4 content-center mb-10">
                    @csrf
                    <div class="flex gap-10">
                    <input type="text" name="amount" placeholder="Investment Amount" value="{{old('amount', '')}}" class="text-center border rounded">
                    <label class="my-auto">x</label>
                    <input type="text" name="profit_percentage" placeholder="Invest Multiply" value="{{old('profit_percentage', '')}}" class="text-center border rounded">
                    <input type="date" name="date" id="date" value="{{old('date', '')}}" class="border rounded">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Investment</button>
                    </div>
                </form>
                @endif

                <h2 class="font-bold text-lg mb-5">Investments</h2>
                <x-investment-table :investments="$investments"/>
            </div>
        </div>
    </div>
  
</x-app-layout>