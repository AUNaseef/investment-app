<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-bold text-lg mb-10">{{$user->name}}'s Profile</h2>
                <form method="post" action="/customers/{{$user->id}}/add-investment" class="mb-10">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                         <p class="text-red-500">{{$error}}</p>
                        @endforeach
                    @endif
                    <input type="text" name="amount" placeholder="Investment Amount" value="{{old('amount', '')}}" class="text-center border">
                    <label>x</label>
                    <input type="text" name="profit_percentage" placeholder="Invest Multiply" value="{{old('profit_percentage', '')}}" class="text-center border">
                    <input type="date" name="date" id="date" value="{{old('date', '')}}" class="border">
                    <button>Add Investment</button>
                </form>
                <h2 class="font-bold text-lg mb-5">Investments</h2>
            </div>
        </div>
    </div>
  
</x-app-layout>