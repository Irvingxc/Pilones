<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {

    }


   

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $verusuario = new User;
        $verusuario->name = $request->input('name');
        $verusuario->email = $request->input('email');
        $verusuario->password = $request->input('password');
        $verusuario->save();
    
        return redirect('/verusuario/index');
        
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
      //  $id= Crypt::decrypt($id);
        $verusuarios = User::where('id', '=', $verusuario)->first();
        return view('Auth.register')->with('register',$verusuarios);
    } 
    public function ver()
    {
        return view('Auth.register');
        
    }

    public function update(Request $request, $verusuario)
    {
        $verusuario =User:: where ('id','=', $verusuario)->first();
        $this->validate($request, [
            'name' => 'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $verusuario->name = $request->input('name');
        $verusuario->email = $request->input('email');
        $verusuario->password= $request->input('password');
        $verusuario->save();
        return redirect('/verusuario/index');
    }





}
