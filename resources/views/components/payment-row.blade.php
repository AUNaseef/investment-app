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

  <!-- investment date -->  
  <td class="mb-4 text-xs font-extrabold tracking-wider">
    <a href="/investments/{{$payment->investment->id}}">
      {{$payment->investment->date ?? ""}}
    </a>
  </td>
  @endif

  <!-- payment details editable -->  
  @if(Auth::user()->role == 'admin' && !request()->has('asUser'))
  <form action="/payments/{{$payment->id}}" method="post">
    @csrf
    @method('put')
    <td class="mb-4 text-xs font-extrabold tracking-wider items-center">
      <p>
        LKR
        <input type="number" name="amount" value="{{$payment->amount ?? null}}" style="width: 75px">
      </p>
    </td>
    <td class="mb-4 text-xs font-extrabold tracking-wider items-center">
      <p>
        <input type="date" name="due_date" value="{{$payment->due_date ?? null}}">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 mx-4 px-4 rounded">save</button>
      </p>
    </td>
  </form>
  @endif


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