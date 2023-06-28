<!-- start a table -->
<table class="table-fixed w-full">

    <!-- table head -->
    <thead class="text-left">
        <tr>
            <th class="w-1/2 pb-2 text-sm font-extrabold tracking-wide">Amount</th>
            <th class="w-1/2 pb-2 text-sm font-extrabold tracking-wide">Date</th>
        </tr>
    </thead>
    <!-- end table head -->

    <!-- table body -->
    <tbody class="text-left text-gray-600">
        @foreach($payments as $payment)
        <x-payment-row :payment="$payment" />
        @endforeach
    </tbody>
    <!-- end table body -->
</table>
<!-- end a table -->