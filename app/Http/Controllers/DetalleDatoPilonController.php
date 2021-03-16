<?php

namespace App\Http\Controllers;

use App\Models\Detalle_dato_pilon;
use Illuminate\Http\Request;
use App\Chart;
use Illuminate\Support\Facades\DB;

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

    public function all(Request $request, $ids)
    {
       
       // $temp = Detalle_Dato_Pilon::all();
       $temperatu=[];
       $temp = Detalle_dato_pilon::all();
        $temperatura = DB::table('Detalle_Dato_Pilons')->where('pilon_id', '=', $ids)
        ->select('temperatura', 'fecha_detalle')
        ->orderByRaw('fecha_detalle ASC')// DB::raw('count(*) as total'))
      // ->groupBy('fecha_detalle')
        ->pluck('temperatura', 'fecha_detalle')->all();

        $fechas = DB::table('Detalle_Dato_Pilons')->select('fecha_detalle')
        ->orderByRaw('fecha_detalle ASC')// DB::raw('count(*) as total'))
      // ->groupBy('fecha_detalle')
        ->pluck('fecha_detalle')->all();

        $chart = new Detalle_dato_pilon();
        $chart->labels = (array_keys($temperatura));
        $chart->dataset = (array_values($temperatura));
        //return view('Reportes.Grafico')->with('temperatura',json_encode($temperatura,JSON_NUMERIC_CHECK));
        return view('Reportes.Grafico', compact('chart')); 
//return view('charts.index', compact('chart'));
//return Response::json($results);

    }

    public function alle(Request $request)
    {
       
       // $temp = Detalle_Dato_Pilon::all();
        $users = DB::table('Detalle_Dato_Pilons')->select('temperatura', DB::raw('count(*) as total'))
        ->groupBy('temperatura')
        ->pluck('total', 'temperatura')->all();

        $chart = new Detalle_Dato_Pilon;
        $chart->labels = (array_keys($users));
        $chart->dataset = (array_values($users));
        return $chart;//view('Reportes.Grafico', compact('chart')); 
//return view('charts.index', compact('chart'));

    }

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
