@props([
    'details' => false,
    'payment' => null
])

@php
$status = $payment->amount > 0 ? "paid" : ($payment->due_date < date("Y-m-d") ? "overdue" : "unpaid")
@endphp

<!-- item -->
<tr>

  @if($details)
  <!-- customer -->
  <td class="mb-4 text-xs font-extrabold tracking-wider">
    <a href="/customers/{{$payment->investment->user->id}}">
      {{$payment->investment->user->name ?? ""}}
    </a>
  </td>
  <!-- customer -->
  @endif

  <!-- amount -->
  <td class="mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
    @if(Auth::user()->role == 'admin')
      <form action="/payments/{{$payment->id}}" method="post">
        @csrf
        @method('put')
        <input type="number" name="amount" value="{{$payment->amount ?? null}}">
        <button type="submit" class="border border-black p-1 rounded">save</button>
      </form>
    @else
      <p class="name-1">${{$payment->amount ?? null}}</p>
    @endif
  </td>
  <!-- amount -->

  <!-- date -->
  <td class="mb-4 text-xs font-extrabold tracking-wider">{{$payment->due_date ?? ""}}<span
      class="num-4"></span>
  </td>
  <!-- date -->

  <!-- status -->
  <td class="mb-4 text-xs font-extrabold tracking-wider">
    @if($status == 'paid')
      <p class="text-green-500">Paid</p>
    @elseif($status == 'unpaid')
    <p class="text-yellow-500">Unpaid</p>
    @elseif($status == 'overdue')
    <p class="text-red-500">Overdue</p>
    @endif
  </td>
  <!-- status -->
</tr>