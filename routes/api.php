<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AnggotaController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('/allAnggota', [App\Http\Controllers\API\AnggotaController::class, 'index']);
    Route::get('/anggota/{nim}', [App\Http\Controllers\API\AnggotaController::class, 'show']);
    Route::post('/tambahAnggota', [App\Http\Controllers\API\AnggotaController::class, 'store']);
    Route::post('/ubahAnggota/{nim}', [App\Http\Controllers\API\AnggotaController::class, 'update']);
    Route::post('/hapusAnggota/{nim}', [App\Http\Controllers\API\AnggotaController::class, 'destroy']);
    // Route::resource('/anggota', [App\Http\Controllers\API\AnggotaController::class, 'index']);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
// });
