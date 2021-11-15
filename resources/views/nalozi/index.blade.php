<x-guest-layout>
  <x-slot name="header">
    <h2>
      {{ __('Popis naloga') }}
    </h2>
  </x-slot>

  <div>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Iznos</th>
          <th>Opis</th>
          <th>Poziv</th>
          <th>Izvrsen</th>
          <th>Referencija</th>
          <th>Naknada</th>
        </tr>
      </thead>
      <tbody>
        @if(count($nalozi) > 0)
        @foreach($nalozi as $nalog)
        <tr>
          <td><a href="{{route('nalozi.show', $nalog)}}" title="{{$nalog->opis}}">{{date("m.Y.", strtotime($nalog->izvrsen))}}</a></td>
          <td>{{number_format($nalog->iznos/100, 2, ',', '')}}</td>
          <td>{{$nalog->opis}}</td>
          <td>{{$nalog->poziv}}</td>
          <td>{{date("d.m.Y. \u G:i:s", strtotime($nalog->izvrsen))}}</td>
          <td>{{$nalog->referencija}}</td>
          <td>{{number_format($nalog->naknada/100, 2, ',', '')}}</td>
        <tr>
          @endforeach
          @else
        <tr>Nema naloga</tr>
        @endif
      </tbody>
    </table>

  </div>
</x-guest-layout>
