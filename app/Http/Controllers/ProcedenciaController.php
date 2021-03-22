<?php

namespace App\Http\Controllers;

use App\Models\Procedencia;
use Illuminate\Http\Request;

class ProcedenciaController extends Controller
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
            $categoria="nombre";
        }
        $caracteres = $request->get('busqueda');
        $procedencia = procedencia::where("$categoria", 'like', "%$caracteres%")->paginate(50);
        return view('Procedencia.mostrar', compact('procedencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Procedencia.procedencia');
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
            'nombre' => 'required|max:25',
            'descripcion' => 'required|max:255',
        ]);

    $procedencia = new Procedencia;
    $procedencia->nombre = $request->input('nombre');
    $procedencia->descripcion = $request->input('descripcion');
    $procedencia->save(); 

    return redirect('/procedencia/index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $procedencia = Procedencia::findOrFail($id);
        return view('procedencia.procedencia')->with('procedencia', $procedencia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedencia $procedencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $procedencias)
    {
        $procedencia = Procedencia::findOrFail($procedencias);
        $this->validate($request, [
            'nombre' => 'required|max:25',
            'descripcion' => 'required|max:255',
        ]);

    $procedencia->nombre = $request->input('nombre');
    $procedencia->descripcion = $request->input('descripcion');
    $procedencia->save(); 

    return redirect('/procedencia/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($procedencia)
    {
        try {
            //$variedade =Variedad:: where ('codigo_variedad','=', $variedad)->first();
             $procedencias = Procedencia::findOrfail($procedencia);
             $procedencias->delete();
             return redirect('/procedencia/index')->with('Eliminar', 'Ok.');
        } 
            catch (\Throwable $th) {
                return redirect('/procedencia/index')->with('Eliminar', 'No.');
            }

        
    }
    }
