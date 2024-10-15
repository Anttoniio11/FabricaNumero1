<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TipoTransaccionController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});
    
Route::group([

    'middleware' => 'auth:api',

], function ($router) {

    Route::resource('transacciones', TransaccionController::class);
    Route::resource('tipo_transacciones', TipoTransaccionController::class);

});
