<?php

namespace App\Http\Controllers;

use App\Models\Racuni;
use Illuminate\Http\Request;

class RacuniController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $racuni = Racuni::all();
    //dd($racuni);
    return view('racuni.index')->with(compact('racuni'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('racuni.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //dd($request);
    $this->validate($request, [
      'iznos' => 'required',
      'poziv' => 'required',
      'izvrsen' => 'required',
      'referencija' => 'required',
      'naknada' => 'required'
    ]);
    $racun = new Racuni;
    $racun->iznos = $request->input('iznos') * 100;
    $racun->opis = $request->input('opis') ?? null;
    $racun->poziv = $request->input('poziv');
    $racun->izvrsen = $request->input('izvrsen');
    $racun->referencija = $request->input('referencija');
    $racun->naknada = $request->input('naknada') ? $request->input('naknada')*100 : null;
    $racun->save();
    return redirect(route('racuni.show', $racun));

  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Racuni  $racuni
   * @return \Illuminate\Http\Response
   */
  public function show(Racuni $racuni)
  {
    return view('racuni.show')->with(compact('racuni'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Racuni  $racuni
   * @return \Illuminate\Http\Response
   */
  public function edit(Racuni $racuni)
  {
    return view('racuni.edit');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Racuni  $racuni
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Racuni $racuni)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Racuni  $racuni
   * @return \Illuminate\Http\Response
   */
  public function destroy(Racuni $racuni)
  {
    //
  }
}
