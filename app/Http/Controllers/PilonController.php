<?php

namespace App\Http\Controllers;

use App\Models\Pilon;
use App\Models\Finca;
use App\Models\Ubicacion;
use App\Models\tipoclase;
use App\Models\Variedad;
use Illuminate\Http\Request;

class PilonController extends Controller
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
        $pilon = Pilon::all();
        $ubicacion = Ubicacion::all();
        $finca = Finca::all();
        $clase = tipoclase::all();
        $clase = Variedad::all();
        return view ('pilones.pilonmost',['pilon'=>$pilon]); 
         
    }

    public function grafico()
    {
        $pilon = Pilon::all();
        $ubicacion = Ubicacion::all();
        $finca = Finca::all();
        $clase = tipoclase::all();
        $clase = Variedad::all();
        return view ('Reportes.Grafico',['pilon'=>$pilon]); 
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pilonindex()
    {
        $pilon = Pilon::all();
        $ubicacion = Ubicacion::all();
        $finca = Finca::all();
        $clase = tipoclase::all();
        $variedad = Variedad::all();
        return view('pilones.pilon', ['ubicacion'=>$ubicacion, 'finca'=>$finca,
        'clase'=>$clase, 'variedad'=>$variedad]);
        
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'codigo_pilon' => 'required',
            'descripcion_pilon'=> 'required',
        ]);

    $pilon = new pilon; 
    $pilon->codigo_pilon = $request->input('codigo_pilon');
    $pilon->descripcion_pilon = $request->input('descripcion_pilon');
    $pilon->save();
    return redirect('/pilon/index');

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pilon  $pilon
     * @return \Illuminate\Http\Response
     */
    public function show($codigo_pilon)
    {
     $pilon = Pilon::where('codigo_pilon', '=', $codigo_pilon)->first();
     return view('Pilones.pilon')->with('pilon',$pilon);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pilon  $pilon
     * @return \Illuminate\Http\Response
     */
    public function edit(pilon $pilon)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pilon $pilon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pilones)
    {
        $pilon =pilon:: where ('codigo_pilon','=', $pilones)->first();
        $this->validate($request, [
            'codigo_pilon' => 'required',
            'descripcion_pilon'=> 'required',
        ]);


    $pilon->codigo_pilon = $request->input('codigo_pilon');
    $pilon->descripcion_pilon = $request->input('descripcion_pilon');
    $pilon->save();
    return redirect('/pilon/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pilon  $pilon
     * @return \Illuminate\Http\Response
     */
    public function destroy( $pilon)
    {
        $pilon =Pilon:: where ('codigo_pilon','=', $pilon)->first();
         $pilon->delete();
         return redirect('/pilon/index');
    }
}
