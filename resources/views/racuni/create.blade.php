<x-guest-layout>
  <x-slot name="header">
    <h2>
      {{ __('Novi račun') }}
    </h2>
  </x-slot>

  <div>
    <form method="POST" action="{{ route('racuni.store') }}">
      @csrf

      <!-- iznos -->
      <div>
        Iznos: <input id="iznos" type="number" name="iznos" value="{{old('iznos')?? 0}}" min="0" step="0.01" />
      </div>
      <!-- opis -->
      <div>
        Opis: <input id="opis" type="text" name="opis" value="{{old('opis')?? ''}}" />
      </div>
      <!-- poziv -->
      <div>
        Poziv: <input id="poziv" type="text" name="poziv" value="{{old('poziv')?? ''}}" />
      </div>
      <!-- izvrsen -->
      <div>
        Izvršen: <input id="izvrsen" type="datetime-local" name="izvrsen" value="{{old('izvrsen')?? date('Y-m-d\TH:i:s')}}" step="1" />
      </div>
      <!-- referencija -->
      <div>
        Referencija: <input id="referencija" type="text" name="referencija" value="{{old('referencija')?? ''}}" />
      </div>
      <!-- naknada -->
      <div>
        Naknada: <input id="naknada" type="number" name="naknada" value="{{old('naknada')?? 0}}" min="0" step="0.01" />
      </div>

      <input type="submit">
    </form>
  </div>
</x-guest-layout>
