<?php

namespace App\Http\Controllers;

use App\Models\Pilon;
use App\Models\Detalle_pilon;
use App\Models\Finca;
use App\Models\Ubicacion;
use App\Models\tipoclase;
use App\Models\Variedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
       // $pilon = Pilon::all();
       $suc= Auth::user()->sucursal;
        $pilon = DB::table('pilons')
        ->join('procedencias', 'procedencias.id','=',
         'pilons.sucursal_id')->where('sucursal_id', '=', "$suc")
         ->join('ubicacions', 'ubicacions.id', '=', 'pilons.ubicacion')
        // where("$categoria", 'like', "%$caracteres%")
         ->select('pilons.*', 'procedencias.nombre', 'ubicacions.codigo_ubicacion as cod')->paginate(50);
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
        $suc= Auth::user()->sucursal;
        $pilon = Pilon::all();
        $ubicacion = Ubicacion::where('procedencias_id', '=', $suc)->get();
        $finca = Finca::all();
        $clase = tipoclase::all();
        $variedad = Variedad::all();
        $true = 1;
        $mostrar=0;
        return view('pilones.pilon', ['ubicacion'=>$ubicacion, 'finca'=>$finca,
        'clase'=>$clase, 'variedad'=>$variedad, 'true'=>$true, 'mostrar'=>$mostrar]);
        
    }

    //----------------------------------------------

    public function detallesave(Request $request)
    {
        $detalle=new Detalle_pilon();
        $detalle->codigo_clase = $request->codigo_clase;
        $detalle->codigo_finca = $request->codigo_finca;
        $detalle->codigo_variedad = $request->codigo_variedad;
        $detalle->pilon_id = $request->pilon_id;
        $detalle->save();
        
    }



    public function verDetalles($id)
    {
        //$detalle=Detalle_pilon::where('pilon_id','=', $id)->get();
        $detalle = DB::table('detalle_pilons')
        ->join('variedads', 'variedads.codigo_variedad', '=', 'detalle_pilons.codigo_variedad')
        ->join('tipoclases', 'tipoclases.codigo_clase', '=', 'detalle_pilons.codigo_clase')
        ->join('fincas', 'fincas.codigo_finca', '=', 'detalle_pilons.codigo_finca')
        ->where('pilon_id', '=', $id)
        ->select('detalle_pilons.*', 'variedads.nombre_variedad as varied', 'tipoclases.nombre_clase as class',
    'fincas.nombre_finca as fincas')->get();

        return $detalle;
        
    }

    public function destroyDetalle($pilon)
    {
        $detalle = Detalle_pilon::findOrFail($pilon);
        $detalle->delete();
        return $detalle;

        /*$pilon =Pilon:: where ('codigo_pilon','=', $pilon)->first();
         $pilon->delete();
         return redirect('/pilon/index');*/
        
    }

    //-----------------------------------------------------------
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'codigo_pilon' => 'required',
            'descripcion_pilon'=> 'required',
            'fecha_inicio'=> 'required',
            'ubicacion'=> 'required',
        ]);

    /*$pilon = new pilon; 
    $pilon->codigo_pilon = $request->input('codigo_pilon');
    $pilon->descripcion_pilon = $request->input('descripcion_pilon');
    $pilon->save();
    $codigo_pilon=o;*/

    $id = pilon::create([
        'codigo_pilon' => $request->codigo_pilon,
        'descripcion_pilon' => $request->descripcion_pilon,
        'ubicacion' => $request->input('ubicacion'),
        'Fecha_datos_pilones' => $request->input('fecha_inicio'),
        'sucursal_id' => $request->sucursal,
        'Fecha_empilonamiento' => $request->input('Fecha_empilonamiento'),
        'peso' => $request->peso
    ]);

    if($id==null){
        $mostrar = 0;
    }else{
        $mostrar = $id->id;

    }
    $update = Ubicacion::findOrFail($request->input('ubicacion'));
    $update->estado_ubicacion = 0;
    $update->save(); 




    //required min=<?php $hoy=date("Y-m-d"); echo $hoy;
    //value="{{date('Y-m-d', strtotime($pilon->fecha_datos_pilones))}}"
    $pilon =Pilon::findOrFail($mostrar);
    $ubicacion = Ubicacion::all();
    $finca = Finca::all();
    $clase = tipoclase::all();
    $variedad = Variedad::all();
    $true = 0; 
    return view('pilones.pilon', ['ubicacion'=>$ubicacion, 'finca'=>$finca,
    'clase'=>$clase, 'variedad'=>$variedad, 'true'=>$true, 'mostrar'=>$mostrar, 'pilon'=>$pilon]);
    //return $mostrar;

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pilon  $pilon
     * @return \Illuminate\Http\Response
     */
    public function show($codigo_pilon)
    {
     $pilon = DB::table('pilons')->
     join('ubicacions', 'ubicacions.id', '=', 'pilons.ubicacion')->where('pilons.id', '=', $codigo_pilon)
     ->select('pilons.*', 'ubicacions.codigo_ubicacion as ubiselect')->first();
     //return view('Pilones.pilon')->with('pilon',$pilon);  
     
     $suc= Auth::user()->sucursal;
        $ubicacion = Ubicacion::where('procedencias_id', '=', $suc)->get();
        $finca = Finca::all();
        $clase = tipoclase::all();
        $variedad = Variedad::all();
        $true = 2;
        $mostrar=$codigo_pilon;
        return view('pilones.pilon', ['ubicacion'=>$ubicacion, 'finca'=>$finca,
        'clase'=>$clase, 'variedad'=>$variedad, 'true'=>$true, 'mostrar'=>$mostrar, 'pilon'=>$pilon]);
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
        $pilon =pilon:: where ('id','=', $pilones)->first();
        $this->validate($request, [
            'codigo_pilon' => 'required',
            'descripcion_pilon'=> 'required',
        ]);


        $pilon->codigo_pilon = $request->input('codigo_pilon');
        $pilon->descripcion_pilon = $request->input('descripcion_pilon');
        $pilon->ubicacion = $request->input('ubicacion');
        $pilon->Fecha_datos_pilones = $request->input('fecha_inicio');
        $pilon->sucursal_id = $request->input('sucursal');
        $pilon->Fecha_empilonamiento= $request->input('Fecha_empilonamiento');
        $pilon->peso= $request->input('peso'); 
        $pilon->save(); 
        $updateLibre = Ubicacion::findOrFail($request->input('disponible'));
        $updateLibre->estado_ubicacion = 1;
        $updateLibre->save();
        $update = Ubicacion::findOrFail($request->input('ubicacion'));
        $update->estado_ubicacion = 0;
        $update->save(); 
        return $this->show($pilones);
        //return redirect::route('pilon.show',['pilones'=>$pilones]);
       // return redirect('/pilon/edit/{'+$pilones+'}');  
       
        //required min=<?php $hoy=date("Y-m-d"); echo $hoy;
        //value="{{date('Y-m-d', strtotime($pilon->fecha_datos_pilones))}}"
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
