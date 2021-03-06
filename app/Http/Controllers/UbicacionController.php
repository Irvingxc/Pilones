<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\UserInterface;

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
        $suc= Auth::user()->sucursal;
        $caracteres = $request->get('busqueda');
        $ubicacion = DB::table('ubicacions')
        ->join('procedencias', 'procedencias.id','=',
         'ubicacions.procedencias_id')->where('procedencias_id', '=', "$suc")
         ->join('pilons', 'pilons.ubicacion', '=', 'ubicacions.id')
         ->
         where("$categoria", 'like', "%$caracteres%")
         ->select('ubicacions.*', 'procedencias.nombre', 'pilons.codigo_pilon as pilon')->paginate(50);
         
         //('ubicacions.codigo_ubicacion', 'ubicacions.descripcion_ubicacion',
       // 'ubicacions.estado_ubicacion', '');

       // $ubicacion = ubicacion::where("$categoria", 'like', "%$caracteres%")->paginate(50);
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
            'Codigo_ubicacion' => 'required|unique:ubicacions',
            'descripcion_ubicacion' => 'required',
            'procedencia'=>'required'
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
    $ubicacion->procedencias_id = $request->input('procedencia');
    
    $ubicacion->save(); 

    return redirect('/ubicacion/index'); //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ubicacion  $ubicacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion=ubicacion::where('id', '=',$id)->first();
        return view('ubicacion.ubicacion')->with('ubicacion', $ubicacion);
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
        $ubicacion =ubicacion::where('id','=', $ubicacion)->first();
         $ubicacion->delete();
         return redirect('/ubicacion/index')->with('Eliminar', 'Ok.');//
    }
}
