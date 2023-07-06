<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="font-bold text-lg mb-10">Customers</h2>
                <form class="flex gap-4 content-center mb-10">
                    <input type="text" name="search" placeholder="Search" value="{{request()->input('search')}}" class="text-center border rounded">
                    <button class="btn-gray">Search</button>
                </form>
                <x-customer-table :customers="$customers"/>
            </div>
        </div>
    </div>
</x-app-layout>