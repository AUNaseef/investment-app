@props([
    'details' => false,
    'payment' => null
])

@php
$status = $payment->amount > 0 ? "paid" : ($payment->due_date < date("Y-m-d") ? "overdue" : "unpaid")
@endphp

<!-- item -->
<tr>

  @if($details && !request()->has('asUser'))
  <!-- customer -->
  <td class="mb-4 text-xs font-extrabold tracking-wider">
    <a href="/customers/{{$payment->investment->user->id}}">
      {{$payment->investment->user->name ?? ""}}
    </a>
  </td>
  <!-- customer -->

  <!-- investment amount -->
  <td class="mb-4 text-xs font-extrabold tracking-wider">
    <a href="/investments/{{$payment->investment->id}}">
      {{$payment->investment->amount ?? ""}}
    </a>
  </td>

  <!-- investment date -->  <td class="mb-4 text-xs font-extrabold tracking-wider">
    <a href="/investments/{{$payment->investment->id}}">
      {{$payment->investment->date ?? ""}}
    </a>
  </td>
  @endif

  <!-- amount -->
  <td class="mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
    @if(Auth::user()->role == 'admin' && !request()->has('asUser'))
      <form action="/payments/{{$payment->id}}" method="post">
        @csrf
        @method('put')
        <div class="flex gap-5">
          <p class="pt-2">LKR</p>
        <input type="number" name="amount" value="{{$payment->amount ?? null}}" style="width: 75px">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">save</button>
        </div>
      </form>
    @else
      <p class="name-1">LKR {{$payment->amount ?? null}}</p>
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