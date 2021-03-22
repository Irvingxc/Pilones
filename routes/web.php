<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('auth.login');
});*/
/*Route::get('/procedencia', function () { 
    return view('Procedencia.procedencia');
});*/
Route::get('pilon/pdf',[App\Http\Controllers\ReporteController::class, 'generar'])->name('reporte.show');

Auth::routes();
Route::get('/procedencia', [App\Http\Controllers\ProcedenciaController::class, 'create'])->name('procedencia');
Route::post('/procedencia/store', [App\Http\Controllers\ProcedenciaController::class, 'store'])->name('procedencia.store');
Route::get('/procedencia/index', [App\Http\Controllers\ProcedenciaController::class, 'index'])->name('procedencia.index');
Route::get('/procedencia/edit/{id}', [App\Http\Controllers\ProcedenciaController::class, 'show'])->name('procedencia.show');
Route::post('/procedencia/update/{procedencias}/nose', [App\Http\Controllers\ProcedenciaController::class, 'update'])->name('procedencia.update');
Route::delete('/procedencia/{id}',[App\Http\Controllers\ProcedenciaController::class,'destroy'])->name('procedencias.destroy');



/*------------------------------HOME-------------------------------*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'indexes'])->name('home');
Route::get('/home/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('home.menu'); 


/*------------------------------Detalle Pilones-------------------------------*/

Route::get('/detalledatopilon/other/{datos}', [App\Http\Controllers\DetallePilonController::class, 'index'])->name('calendario');
Route::get('/detalledatopilon/listar/{id}', [App\Http\Controllers\DetallePilonController::class, 'mostrar'])->name('calendario.mostrar');
Route::post('/detalledatopilon/store', [App\Http\Controllers\DetallePilonController::class, 'store'])->name('calendario.store');
Route::post('/detalledatopilon/update/{id_impor}', [App\Http\Controllers\DetallePilonController::class, 'update'])->name('calendario.update');

/*------------------------------Finca-------------------------------*/

Route::post('/fincas/store', [App\Http\Controllers\FincaController::class,'store'])->name('fincas.store');

Route::get('/fincas/index', [App\Http\Controllers\FincaController::class,'index'])->name('fincas.index');

Route::get('/fincas', [App\Http\Controllers\FincaController::class,'create'])->name('fincas');

Route::get('/fincas/edit/{codigo_finca}', [App\Http\Controllers\FincaController::class,'show'])->name('fincas.show');

Route::post('/fincas/update/{fincas}', [App\Http\Controllers\FincaController::class,'update'])->name('fincas.update');

Route::delete('/fincas/{fincas}',[App\Http\Controllers\FincaController::class,'destroy'])->name('fincas.destroy');



/*------------------------------PILON -------------------------------*/
Route::get('/pilon/grafico/{id?}', [App\Http\Controllers\DetalleDatoPilonController::class,'all'])->name('pilon.grafico');
Route::get('/pilon', [App\Http\Controllers\PilonController::class,'pilonindex'])->name('pilon.pilonindex');

Route::get('/pilon/index', [App\Http\Controllers\PilonController::class,'index'])->name('pilon.index');
Route::get('/pilon/all', [App\Http\Controllers\PilonController::class,'indexGerentes'])->name('pilon.gerentes');

Route::post('/pilon/store', [App\Http\Controllers\PilonController::class,'store'])->name('pilon.store');
/*--------------------------------------------------*/

Route::get('/pilon/ver/{id}', [App\Http\Controllers\PilonController::class,'verDetalles'])->name('pilon.ver');
Route::post('/pilon/detalle', [App\Http\Controllers\PilonController::class,'detallesave'])->name('pilon.d');
Route::delete('/pilon/delete/{pilon}', [App\Http\Controllers\PilonController::class,'destroyDetalle'])->name('pilon.dea');
/*-------------------------------------------------*/

Route::get('/pilon/edit/{codigo_pilon}', [App\Http\Controllers\PilonController::class,'show'])->name('pilon.show');

Route::post('/pilon/update/{pilones}', [App\Http\Controllers\PilonController::class,'update'])->name('pilon.update');

Route::delete('/pilon/{pilon}',[App\Http\Controllers\PilonController::class,'destroy'])->name('pilon.destroy');



/*------------------------------VARIEDAD -------------------------------*/

Route::get('/variedad', [App\Http\Controllers\variedadController::class,'var'])->name('variedad');

Route::get('/variedad/index', [App\Http\Controllers\variedadController::class,'index'])->name('variedad.index');

Route::post('/variedad/store', [App\Http\Controllers\variedadController::class,'store'])->name('variedad.store');

Route::get('/variedad/edit/{codigo_variedade}', [App\Http\Controllers\variedadController::class,'show'])->name('variedad.show');

Route::post('/variedad/update/{variedade}', [App\Http\Controllers\variedadController::class,'update'])->name('variedad.update');

Route::delete('/variedad/{variedad}',[App\Http\Controllers\variedadController::class,'destroy'])->name('variedad.destroy');

    Route::post('/ubicacion/stored', [App\Http\Controllers\UbicacionController::class, 'store'])->name('ubicacion.store');
   // ->middleware('permission:ubicacion.stored');
    Route::get('/ubicacion/index', [App\Http\Controllers\UbicacionController::class, 'index'])->name('ubicacion.index');
    Route::get('/ubicacion/ubicacion', [App\Http\Controllers\UbicacionController::class, 'create'])->name('ubicacion');
    //->middleware('permission:ubicacion');
    Route::get('/ubicacion/edit/{codigo_ubicacion}', [App\Http\Controllers\UbicacionController::class, 'show'])->name('ubicacion.show');
    //->middleware('permission:ubicacion.show');
    Route::post('/ubicacion/update/{ubicaciones}', [App\Http\Controllers\UbicacionController::class, 'update'])->name('ubicacion.update');
    //->middleware('permission:ubicacion.update');
    Route::delete('/ubicacion/{codigo_ubicacion}', [App\Http\Controllers\UbicacionController::class, 'destroy'])->name('ubicacion.destroy');
   // ->middleware('permission:ubicacion.destroy');

/*------------------------------UBICACION-------------------------------*/
Route::middleware(['role:cliente'])->group(function () {
});

/*------------------------------CLASES-------------------------------*/

Route::post('/tipoclase/stored', [App\Http\Controllers\tipoclaseController::class, 'store'])->name('tipoclase.store');
Route::get('/tipoclase/index', [App\Http\Controllers\tipoclaseController::class, 'index'])->name('tipoclase.index');
Route::get('/tipoclase/tipoclase', [App\Http\Controllers\tipoclaseController::class, 'create'])->name('tipoclase');
Route::get('/tipoclase/edit/{codigo_clase}', [App\Http\Controllers\tipoclaseController::class, 'show'])->name('tipoclase.show');
Route::post('/tipoclase/update/{tipoclases}', [App\Http\Controllers\tipoclaseController::class, 'update'])->name('tipoclase.update');
Route::delete('/tipoclase/{codigo_clase}', [App\Http\Controllers\tipoclaseController::class, 'destroy'])->name('tipoclase.destroy');



/*------------------------------------------------------USUSARIO----------------------------------------------------------*/
Route::post('/verusuario/stored', [App\Http\Controllers\userController::class, 'store'])->name('verusuario.store');
Route::get('/verusuario/index', [App\Http\Controllers\userController::class, 'index'])->name('verusuario.index');
Route::delete('/verusuario/{email}', [App\Http\Controllers\userController::class, 'destroy'])->name('verusuario.destroy');
Route::get('/verusuario', [App\Http\Controllers\userController::class,'ver'])->name('verusuario');
Route::get('/verusuario/edit/{id}', [App\Http\Controllers\userController::class, 'show'])->name('verusuario.show');
Route::post('/verusuario/update/{users}', [App\Http\Controllers\userController::class, 'update'])->name('verusuario.update');
/*------------------------------------------------------Roles----------------------------------------------------------*/
Route::post('/role/store', [App\Http\Controllers\RoleController::class,'store'])->name('role.store');
Route::get('/role/index', [App\Http\Controllers\RoleController::class,'index'])->name('role.index');
Route::get('/role', [App\Http\Controllers\RoleController::class,'create'])->name('role');
Route::get('/role/edit/{id}', [App\Http\Controllers\RoleController::class,'show'])->name('role.show');
Route::post('/role/update/{role}', [App\Http\Controllers\RoleController::class,'update'])->name('role.update');
Route::delete('/role/{role}',[App\Http\Controllers\RoleController::class,'destroy'])->name('role.destroy');

