<!-- item -->
<tr>

  <!-- name -->
  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
    <div class="ml-3 w-8 h-8 overflow-hidden rounded-full">
      <img src="/img/user.svg" class="object-cover">
    </div>
    <a href="/customers/{{$customer->id}}">
      <p class="ml-3 name-1">{{$customer->name ?? null}}</p>
    </a>
  </th>
  <!-- name -->

  <!-- phone -->
  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{$customer->phone ?? null}}</th>
  <!-- phone -->

  <!-- email -->
  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{$customer->email ?? null}}</th>
  <!-- email -->

  <!-- amount -->
  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">LKR {{$customer->investments->sum('amount')}}<span
      class="num-4"></span>
  </th>
  <!-- amount -->

  <!-- status -->
  @if($customer->approved)
  <th class="w-1/4 mb-4 text-xs font-extrabold text-green-500 tracking-wider text-right">Approved</th>
  @else
  <th class="w-1/4 mb-4 text-xs font-extrabold text-red-500 tracking-wider text-right">
    <a href="/customers/{{$customer->id}}/approve" class="border-2 border-red-500 p-1 rounded">Approve</a>
  </th>
  @endif
  <!-- status -->

</tr>