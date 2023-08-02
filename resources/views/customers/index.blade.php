<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-bold text-lg mb-10">Customers</h2>
                <div class="flex gap-4">
                <form class="flex gap-4 content-center mb-10">
                    <input type="text" name="search" placeholder="Search" value="{{request()->input('search')}}" class="text-center border rounded">
                    <button class="btn-gray">Search</button>
                </form>
                <div class="justify-items-end">
               <a href="/customers/create"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add User</button></a>
                </div>
                </div>
                <x-customer-table :customers="$customers"/>
            </div>
        </div>
    </div>
</x-app-layout>