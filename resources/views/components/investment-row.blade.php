<!-- item -->
<tr>
  <!-- amount -->
  <th class="w-1/2 mb-4 text-xs font-extrabold tracking-wider flex flex-row items-center w-full">
    <a href="/investments/{{$investment->id}}">
      <p class="name-1">${{$investment->amount ?? null}}</p>
    </a>
  </th>
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