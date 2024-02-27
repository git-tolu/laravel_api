<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personController;
/*\
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', [personController::class, 'index']);
Route::post('/register', [personController::class, 'store']);
Route::get('/single/{id}', [personController::class, 'show']);
Route::put('/update/{id}', [personController::class, 'update']);
Route::delete('/delete/{id}', [personController::class, 'destroy']);
