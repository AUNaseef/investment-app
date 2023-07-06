<!-- start a table -->
<table class="table-fixed w-full">

    <!-- table head -->
    <thead class="text-left">
        <tr>
            <th class="w-1/2 pb-10 text-sm font-extrabold tracking-wide">Name</th>
            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Phone</th>
            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Email</th>
            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">Total Investment
            </th>
            <th class="w-1/4 pb-10 text-sm font-extrabold tracking-wide text-right">status</th>
        </tr>
    </thead>
    <!-- end table head -->

    <!-- table body -->
    <tbody class="text-left text-gray-600">
        @foreach($customers as $customer)
        <x-customer-row :customer="$customer" />
        @endforeach
    </tbody>
    <!-- end table body -->
</table>
<!-- end a table -->