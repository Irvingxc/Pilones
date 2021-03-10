<?php

namespace App\Http\Controllers;

use App\Models\Detalle_pilon;
use App\Models\Detalle_dato_pilon;
use Illuminate\Http\Request;

class DetallePilonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $datos = Detalle_dato_pilon::where('pilon_id', '=', $id)->first();
        return view('Detalle_Dato_Pilon.Calendario', ['datos'=>$datos, 'id'=>$id]);
        //return $id;
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
     * @param  \App\Models\Detalle_pilon  $detalle_pilon
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle_pilon $detalle_pilon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle_pilon  $detalle_pilon
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle_pilon $detalle_pilon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalle_pilon  $detalle_pilon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalle_pilon $detalle_pilon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle_pilon  $detalle_pilon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalle_pilon $detalle_pilon)
    {
        //
    }
}
