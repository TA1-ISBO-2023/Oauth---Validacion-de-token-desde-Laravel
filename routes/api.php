<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpanadaController;
use App\Http\Middleware\Autenticacion;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/v1/empanada',[EmpanadaController::class,'Create'])->middleware(Autenticacion::class);
Route::get('/v1/empanada',[EmpanadaController::class,'List']);
