<?php

namespace App\Http\Controllers;

use App\Models\Detalle_dato_pilon;
use Illuminate\Http\Request;

class DetalleDatoPilonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Detalle_Dato_Pilon.Calendario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detalle_dato_pilon  $detalle_dato_pilon
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle_dato_pilon $detalle_dato_pilon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle_dato_pilon  $detalle_dato_pilon
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle_dato_pilon $detalle_dato_pilon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalle_dato_pilon  $detalle_dato_pilon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalle_dato_pilon $detalle_dato_pilon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle_dato_pilon  $detalle_dato_pilon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalle_dato_pilon $detalle_dato_pilon)
    {
        //
    }
}
