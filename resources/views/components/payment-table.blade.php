@props([
    'details' => false,
    'payments' => null
])

<!-- start a table -->
<table class="table-fixed w-full">

    <!-- table head -->
    <thead class="text-left">
        <tr>
            @if($details && !request()->has('asUser'))
            <th class="pb-2 text-sm font-extrabold tracking-wide">Customer</th>
            <th class="pb-2 text-sm font-extrabold tracking-wide">Investment Amount</th>
            <th class="pb-2 text-sm font-extrabold tracking-wide">Investment Date</th>
            <th class="pb-2 text-sm font-extrabold tracking-wide">Amount</th>
            <th class="pb-2 text-sm font-extrabold tracking-wide">Date</th>
            <th class="pb-2 text-sm font-extrabold tracking-wide">Status</th>
            @else
            <th class="w-2/4 pb-2 text-sm font-extrabold tracking-wide">Amount</th>
            <th class="w-2/4 pb-2 text-sm font-extrabold tracking-wide">Date</th>
            <th class="w-1/4 pb-2 text-sm font-extrabold tracking-wide">Status</th>
            @endif
        </tr>
    </thead>
    <!-- end table head -->

    <!-- table body -->
    <tbody class="text-left text-gray-600">
        @foreach($payments as $payment)
        <x-payment-row :payment="$payment" :details="$details" />
        @endforeach
    </tbody>
    <!-- end table body -->
</table>
<!-- end a table -->