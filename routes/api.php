<?php

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// routes for authentication
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// redirect on route after click email verified email
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifiedAuthEmail'])
    ->middleware(['signed'])->name('verification.verify');

// routes user connected
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // routes auth
    Route::get('auth/verified', [AuthController::class, 'verifiedAuth']);
    Route::delete('auth/logout', [AuthController::class, 'logout']);

    // routes role
    Route::get('role/all', function (Request $request) {
        return Role::all()->toJson();
    });
});

// coucou