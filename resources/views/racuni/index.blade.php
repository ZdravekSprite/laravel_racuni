<x-guest-layout>
  <x-slot name="header">
    <h2>
      {{ __('Popis računa') }}
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
        @if(count($racuni) > 0)
        @foreach($racuni as $racun)
        <tr>
          <td><a href="{{route('racuni.show', $racun)}}" title="{{$racun->opis}}">{{date("m.Y.", strtotime($racun->izvrsen))}}</a></td>
          <td>{{number_format($racun->iznos/100, 2, ',', '')}}</td>
          <td>{{$racun->opis}}</td>
          <td>{{$racun->poziv}}</td>
          <td>{{date("d.m.Y. \u G:i:s", strtotime($racun->izvrsen))}}</td>
          <td>{{$racun->referencija}}</td>
          <td>{{number_format($racun->naknada/100, 2, ',', '')}}</td>
        <tr>
          @endforeach
          @else
        <tr>Nema racuna</tr>
        @endif
      </tbody>
    </table>

  </div>
</x-guest-layout>
