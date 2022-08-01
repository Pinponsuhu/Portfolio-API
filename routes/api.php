<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return response()->json([
        'message' => 'Tesing'
    ]);
});
Route::post('/login',[LoginController::class, 'login']);
Route::middleware('cors')->prefix('v1')->group(function(){
    Route::apiResource('/projects',ProjectController::class);
    Route::apiResource('/techs',TechController::class);
});
Route::get('/all/projects',[ProjectController::class, 'index']);
Route::get('/project/{project}',[ProjectController::class, 'index']);
// Route::get('/techs',[TechController::class, 'index']);
// Route::get('/techs/{tech}',[TechController::class, 'view']);
