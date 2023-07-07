@php
    $isAdmin = Auth::user()->role == 'admin' && !request()->has('asUser')
@endphp

@if($isAdmin)
<form method="post" action="/investments/{{$investment->id}}">
@method('put')
@csrf
  <!-- item -->
  <tr>
    <!-- amount -->
    <td class="mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
        <p class="name-1">LKR </p>
        <input type="number" name="amount" value="{{$investment->amount ?? null}}">
    </td>
    <!-- amount -->

    <!-- profit percentage -->
    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
    <input type="number" step="0.01" name="profit_percentage" value="{{$investment->profit_percentage ?? null}}">
    </th>
    <!-- profit percentage -->

    <!-- date -->
    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">
    <input type="date" name="date" value="{{$investment->date ?? null}}">
      
      
    </th>
    <!-- date -->
    <th class="mb-4 text-xs font-extrabold tracking-wider text-right">
      <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">save</button>
      <a href="/investments/{{$investment->id}}"><button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">view</button></a>
    </th>
  </tr>
</form>

@else
  <!-- item -->
  <tr>
    <!-- amount -->
    <td class="mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
        <p class="name-1">LKR {{$investment->amount ?? null}}</p>
    </td>
    <!-- amount -->

    <!-- profit percentage -->
    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{$investment->profit_percentage ?? null}}</th>
    <!-- profit percentage -->

    <!-- date -->
    <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{$investment->date ?? ""}}<span
        class="num-4"></span>
    </th>
    <!-- date -->
  </tr>
@endif