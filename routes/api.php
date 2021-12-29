<?php

use App\Http\Controllers\Api\Auth\SignInController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\Auth\SignUpController;
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

Route::post('/signin', SignInController::class);
Route::post('/signup', SignUpController::class);

Route::group(['middleware' => ['auth:api']], function() {
    Route::get('/me', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('/posts', PostController::class);
});
