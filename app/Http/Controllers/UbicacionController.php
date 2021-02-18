<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
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
    public function index(Request $request)
    {
        $categoria = $request->get('filtro');
        if($categoria==null){
            $categoria="codigo_ubicacion";
        }
        $caracteres = $request->get('busqueda');
        $ubicacion = ubicacion::where("$categoria", 'like', "%$caracteres%")->paginate(5);
        return view('ubicacion.ubicacionMostrar', compact('ubicacion'));
        //return $caracteres;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ubicacion.ubicacion');
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
            'Codigo_ubicacion' => 'required|unique:ubicacions,codigo_ubicacion',
            'descripcion_ubicacion' => 'required',
        ]);

    $ubicacion = new Ubicacion;
    if ($request->input('checkbox_name')=="Disponible")
    {
        $ubicacion->estado_ubicacion = 1; 
    }else{
        $ubicacion->estado_ubicacion = 0;
    }
    $ubicacion->codigo_ubicacion = $request->input('Codigo_ubicacion');
    $ubicacion->descripcion_ubicacion = $request->input('descripcion_ubicacion');
    
    $ubicacion->save(); 

    return redirect('/ubicacion/index'); //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show($codigo_ubicacion)
    {
        $ubicacion=ubicacion::where('codigo_ubicacion', '=',$codigo_ubicacion)->first();
        return view('ubicacion.ubicacion')->with('ubicacion', $ubicacion); //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ubicaciones)
    {
        $ubicacion= ubicacion::where('codigo_ubicacion', '=', $ubicaciones)->first();
        $this->validate($request, [
            'Codigo_ubicacion' => 'required',
            'descripcion_ubicacion' => 'required',
            'checkbox_name' => 'required', 
        ]);
        if ($request->input('checkbox_name')=="Disponible"){
        $ubicacion->estado_ubicacion = 1; 
    }else{
        $ubicacion->estado_ubicacion = 0;
    }
    $ubicacion->codigo_ubicacion = $request->input('Codigo_ubicacion');
    $ubicacion->descripcion_ubicacion = $request->input('descripcion_ubicacion');
    $ubicacion->save();

    return redirect('/ubicacion/index');  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($ubicacion)
    {
        $ubicacion =ubicacion::where('codigo_ubicacion','=', $ubicacion)->first();
         $ubicacion->delete();
         return redirect('/ubicacion/index');//
    }
}
