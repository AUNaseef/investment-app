<!-- item -->
<tr>

  <!-- name -->
  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
    <div class="ml-3 w-8 h-8 overflow-hidden rounded-full">
      <img src="/img/user.svg" class="object-cover">
    </div>
    <a href="/customers/{{$user->id}}">
      <p class="ml-3 name-1">{{$user->name ?? null}}</p>
    </a>
  </th>
  <!-- name -->

  <!-- email -->
  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{$user->email ?? null}}</th>
  <!-- email -->

  <!-- amount -->
  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{$user->amount ?? "$21323421"}}<span
      class="num-4"></span>
  </th>
  <!-- amount -->

  <!-- status -->
  <th class="w-1/4 mb-4 text-xs font-extrabold tracking-wider text-right">{{$user->approved ?? null}}</th>
  <!-- status -->

</tr>