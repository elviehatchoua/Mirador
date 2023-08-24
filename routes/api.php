<?php

use App\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\MarchandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeRequeteController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\FabriquantController;
use App\Http\Controllers\ModeleController;

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

Route::get('terminals', [TerminalController::class, 'index']);
Route::get('terminals/{id}',  [TerminalController::class, 'show']);
Route::get('terminalsTab', [TerminalController::class, 'showToTabulator']);
Route::post('terminals', [TerminalController::class, 'store']);
Route::put('terminals/{id}', 'TerminalController@update');
Route::delete('terminals/{id}', 'TerminalController@delete');
Route::post('terminalsapi', [TerminalController::class, 'storeAPI']);



Route::get('marchands', [MarchandController::class, 'index']);
Route::get('marchands/{id}',  [MarchandController::class, 'show']);
Route::get('marchandTab',  [MarchandController::class, 'showToTabulator']);
Route::get('termMarchands/{id}',  [MarchandController::class, 'termByMarchand_id']);
Route::post('marchands', [MarchandController::class, 'store']);
Route::put('marchands/{id}', 'MarchandController@update');
Route::delete('marchands/{id}', 'MarchandController@delete');



Route::get('villes', [VilleController::class, 'index']);
Route::get('villes/{id}',  [VilleController::class, 'show']);
Route::get('villeTab',  [VilleController::class, 'showToTabulator']);
Route::post('villes', [VilleController::class, 'store']);
Route::put('villes/{id}', 'VilleController@update');
Route::delete('villes/{id}', 'VilleController@delete');


Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}',  [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@delete');


Route::get('typerequete', [TypeRequeteController::class, 'index']);
Route::get('typerequete/{id}',  [TypeRequeteController::class, 'show']);
Route::get('typerequeteTab',  [TypeRequeteController::class, 'showToTabulator']);
Route::post('typerequete', [TypeRequeteController::class, 'store']);
Route::put('typerequete/{id}', 'TypeRequeteController@update');
Route::delete('typerequete/{id}', 'TypeRequeController@delete');

Route::get('fabriquant', [FabriquantController::class, 'index']);
Route::get('fabriquant/{id}',  [FabriquantController::class, 'show']);
Route::get('fabriquantTab',  [FabriquantController::class, 'showToTabulator']);
Route::post('fabriquant', [FabriquantController::class, 'store']);
Route::put('fabriquant/{id}', 'FabriquantController@update');
Route::delete('fabriquant/{id}', 'FabriquantController@delete');


Route::get('operations', [OperationController::class, 'index']);
Route::get('operationsjs', [OperationController::class, 'circledata']);
Route::get('operations/{id}',  [OperationController::class,'show']);
Route::get('operationsTab', [OperationController::class, 'showToTabulator']);
Route::post('operations', [OperationController::class, 'storeAPI']);
Route::post('operationsDate', [OperationController::class, 'getOperationBydate']);
Route::put('operations/{id}', 'OperationController@update');
Route::delete('operations/{id}', 'OperationController@delete');


Route::get('modeles/{id}', [ModeleController::class, 'modeleByFabriquantId']);
Route::get('ModeleTab', [ModeleController::class, 'showToTabulator']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
