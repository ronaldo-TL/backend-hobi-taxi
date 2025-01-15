<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

Route::get('status', function () {
    return response()->json([
        'mensaje'=>'Servicio api taxi jobi funcionando correctamente',
        'fecha_actual' => (\Carbon\Carbon::now())->format('Y-m-d H:i:s'),
        'version'=>'1.0.0'
    ]);
});

Route::group(['prefix'=>'publico'],function(){
});

Route::group(['prefix'=>'auth'],function(){
    Route::controller(AuthController::class)->group(function (){
        Route::post('login','login');
    });
});

Route::group([
    'prefix'=>'system',
    'middleware'=>'auth:sanctum'
],function(){
    Route::controller(ParametroController::class)->group(function (){
        Route::get('parametros','index');
        Route::get('parametros/grupos','grupos');
        Route::post('parametros','store');
        Route::get('parametros/{parametro}','show');
        Route::put('parametros/{parametro}','update');
        Route::delete('parametros/{parametro}','destroy');
    });

    Route::controller(UsuarioController::class)->group(function (){
        Route::get('usuarios','index');
        Route::get('usuarios/notificaciones','getNotificaciones');
        Route::get('usuarios/notificaciones/cantidad','getCantidadNotificaciones');
        Route::get('usuarios/{user}','show');
        Route::put('usuarios/{user}','update');
        Route::post('usuarios','store');
        Route::patch('usuarios/{user}/estado','updateEstado');
        Route::patch('usuarios/contrasena','updateContrasena');
        Route::patch('usuarios/{user}/reset-contrasena','restorePassword');
    });

    Route::controller(RolController::class)->group(function (){
        Route::get('roles','index');
        Route::post('roles','store');
        Route::get('roles/{rol}','show');
        Route::put('roles/{rol}','update');
        Route::get('roles/{rol}/permisos','permisos');
    });

    Route::controller(MenuController::class)->group(function (){
        Route::get('menus','index');
        Route::post('menus','store');
        Route::get('menus/{menu}','show');
    });

    Route::controller(PermisoController::class)->group(function (){
        Route::get('permisos','index');
        Route::post('permisos','store');
    });
});


Route::group([
    'prefix'=>'jobi',
    'middleware'=>'auth:sanctum'
],function(){
    Route::controller(ConductorController::class)->group(function (){
        Route::get('conductores','index');
        Route::post('conductores','store');
        Route::get('conductores/{conductor}','show');
        Route::put('conductores/{conductor}','update');
        Route::patch('conductores/{conductor}/estado','updateEstado');
        Route::patch('conductores/{conductor}/foto','updateImagenFoto');
        Route::patch('conductores/{conductor}/licencia','updateImagenLicencia');
    });

    Route::controller(CarreraController::class)->group(function (){
        Route::get('carreras','index');
    });

    Route::controller(ComisionController::class)->group(function (){
        Route::get('comisiones','index');
        Route::post('comisiones','store');
        Route::get('comisiones/{comision}/pdf','pdf');
    });
});