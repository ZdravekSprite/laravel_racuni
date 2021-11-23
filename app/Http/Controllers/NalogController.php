<?php

namespace App\Http\Controllers;

use App\Models\Nalog;
use Illuminate\Http\Request;

class NalogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $nalozi = Nalog::orderBy('izvrsen', 'desc')->get();
    return view('nalozi.index')->with(compact('nalozi'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('nalozi.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'iznos' => 'required',
      'poziv' => 'required',
      'izvrsen' => 'required',
      'referencija' => 'required',
      'naknada' => 'required'
    ]);
    $nalog = new Nalog;
    $nalog->iznos = $request->input('iznos') * 100;
    $nalog->opis = $request->input('opis') ?? null;
    $nalog->poziv = $request->input('poziv');
    $nalog->izvrsen = $request->input('izvrsen');
    $nalog->referencija = $request->input('referencija');
    $nalog->naknada = $request->input('naknada') ? $request->input('naknada')*100 : null;
    $nalog->save();
    return redirect(route('nalozi.show', $nalog));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Nalog  $nalog
   * @return \Illuminate\Http\Response
   */
//  public function show(Nalog $nalog)
  public function show($id)
  {
    //dd($id);
    $nalog = Nalog::where('id', '=', $id)->first();
    if (strtotime($nalog->izvrsen) < strtotime("2017-11-01 00:00:00")) {
      return view('nalozi.show_v4')->with(compact('nalog'));
    }
    if (strtotime($nalog->izvrsen) < strtotime("2021-09-01 00:00:00")) {
      return view('nalozi.show_v2')->with(compact('nalog'));
    }
    return view('nalozi.show_v1')->with(compact('nalog'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Nalog  $nalog
   * @return \Illuminate\Http\Response
   */
  public function edit(Nalog $nalog)
  {
    return view('nalozi.edit')->with(compact('nalog'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Nalog  $nalog
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Nalog $nalog)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Nalog  $nalog
   * @return \Illuminate\Http\Response
   */
  public function destroy(Nalog $nalog)
  {
    //
  }
}
