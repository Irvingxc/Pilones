<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class userController extends Controller
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
        $verusuario = User::all();
        return view ('Usuarios.Verususarios',['Usuarios'=>$verusuario]); 
         
    }
    public function destroy( $verusuario)
    {
        $verusuario =User:: where ('email','=', $verusuario)->first();
        $verusuario->delete();
        return redirect('/verusuario/index');
    }

    public function show($verusuario)
    {
        $fverusuario = User::where('email', '=', $verusuario)->first();
        return view('Usuarios.verusuario')->with('verusuario',$verusuario);
    }






}
