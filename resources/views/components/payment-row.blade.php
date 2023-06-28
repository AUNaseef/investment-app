<!-- item -->
<tr>
  <!-- amount -->
  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
    @if(Auth::user()->role == 'admin')
      <form action="/payments/{{$payment->id}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="amount" value="{{$payment->amount ?? null}}">
        <button type="submit" class="border border-black p-1 rounded">save</button>
      </form>
    @else
      <p class="name-1">${{$payment->amount ?? null}}</p>
    @endif
  </th>
  <!-- amount -->

  <!-- date -->
  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider">{{$payment->due_date ?? ""}}<span
      class="num-4"></span>
  </th>
  <!-- date -->

</tr>