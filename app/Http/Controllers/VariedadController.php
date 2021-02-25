<?php

namespace App\Http\Controllers;

use App\Models\Variedad;
use Illuminate\Http\Request;

class VariedadController extends Controller
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
            $categoria="codigo_variedad";
        }
        $caracteres = $request->get('busqueda');
          $variedad = Variedad::where("$categoria", 'like', "%$caracteres%")->paginate(50);
        return view ('variedad.variedadmost',compact('variedad')); 
       
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
      public function var()
    {
        return view('variedad.variedad');
        
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
            'codigo_variedad' => 'required|unique:variedads,codigo_variedad',
            'nombre_variedad' => 'required',
            'descripcion_variedad' =>'required',
        ]);

    $variedad = new variedad;
    $variedad->codigo_variedad = $request->input('codigo_variedad');
    $variedad->nombre_variedad = $request->input('nombre_variedad');
    $variedad->descripcion_variedad = $request->input('descripcion_variedad');
    $variedad->save();

    return redirect('/variedad/index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function show($variedade) 
    {
        $variedad= Variedad::where('codigo_variedad', '=', $variedade)->first();
        return view('Variedad.variedad')->with('variedad',$variedad);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Variedad $variedad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $variedade)
    {
        $variedad =Variedad:: where ('codigo_variedad','=', $variedade)->first();
        $this->validate($request, [
            'codigo_variedad' => 'required',
            'nombre_variedad'=>'required',
            'descripcion_variedad'=>'required',
        ]);
        $variedad->codigo_variedad = $request->input('codigo_variedad');
        $variedad->nombre_variedad = $request->input('nombre_variedad');
        $variedad->descripcion_variedad= $request->input('descripcion_variedad');
        $variedad->save();
        return redirect('/variedad/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variedad  $variedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($variedad)
    {
        $variedade =Variedad:: where ('codigo_variedad','=', $variedad)->first();
           // $variedad = Variedad::findOrfail($variedad);
            $variedade->delete();
            return redirect('/variedad/index');
        
    }
}
