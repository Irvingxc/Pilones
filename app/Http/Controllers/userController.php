<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\role;
use App\Models\Procedencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class userController extends Controller
{
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'sucursal' => $request->procedencia,
        ]);

       /* $verusuario = new User;
        $verusuario->name = $request->input('name');
        $verusuario->email = $request->input('email');
        $verusuario->password = $request->input('password');
        $verusuario->sucursal = $request->input('procedencia');
        $nuevo =$verusuario->save();*/
        $user->assignRole('cliente');
    
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
      $role = Role::all();
      $procedencia = Procedencia::all();
        $verusuarios = User::where('id', '=', $verusuario)->first();
        return view('Auth.register')->with('register',$verusuarios) ('procedencia',$procedencia) ('role',$role);
    } 


    public function ver()
    {
        $role = Role::all();
        $procedencia = Procedencia::all();
        return view('Auth.register', ['procedencia'=>$procedencia, 'role'=>$role]);
       // return view('Auth.register')->with('procedencia',$procedencia);
        
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
