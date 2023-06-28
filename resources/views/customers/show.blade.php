<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-bold text-lg mb-10">{{$user->name}}'s Profile</h2>
            </div>
            <form method="post" action="/customers/{{$user->id}}">
                @csrf
                <input type="text" name="amount" placeholder="Investment Amount">
                <label>x</label>
                <input type="text" name="profit_percentage" placeholder="Invest Multiply">
                <input type="date" name="date" id="">
               <button>Save Info</button>
           </form>


           
        </div>
    </div>
  
</x-app-layout>