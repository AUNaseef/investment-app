<!-- start a table -->
<table class="table-fixed w-full">

    <!-- table head -->
    <thead class="text-left">
        <tr>
            <th class="w-1/3 pb-2 text-sm font-extrabold tracking-wide">Amount</th>
            <th class="w-1/3 pb-2 text-sm font-extrabold tracking-wide text-right">Profit Percentage</th>
            <th class="w-1/3 pb-2 text-sm font-extrabold tracking-wide text-right">Date</th>
        </tr>
    </thead>
    <!-- end table head -->

    <!-- table body -->
    <tbody class="text-left text-gray-600">
        @foreach($investments as $investment)
        <x-investment-row :investment="$investment" />
        @endforeach
    </tbody>
    <!-- end table body -->
</table>
<!-- end a table -->