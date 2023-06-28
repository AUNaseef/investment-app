@php
    $isAdmin = Auth::user()->role == 'admin'
@endphp
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if($isAdmin)
                <h2 class="font-bold text-lg mb-10">{{$user->name}}'s Profile</h2>
                <form method="post" action="/customers/{{$user->id}}/add-investment" class="mb-10">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-error mb-2">
                        @foreach ($errors->all() as $error)
                         <p class="text-red-500">{{$error}}</p>
                        @endforeach
                    </div>
                    @endif
                    <input type="text" name="amount" placeholder="Investment Amount" value="{{old('amount', '')}}" class="text-center border">
                    <label>x</label>
                    <input type="text" name="profit_percentage" placeholder="Invest Multiply" value="{{old('profit_percentage', '')}}" class="text-center border">
                    <input type="date" name="date" id="date" value="{{old('date', '')}}" class="border">
                    <button>Add Investment</button>
                </form>
                @endif
                <h2 class="font-bold text-lg mb-5">@if(!$isAdmin) Your @endif Investments</h2>
                <x-investment-table :investments="$investments"/>
            </div>
        </div>
    </div>
  
</x-app-layout>