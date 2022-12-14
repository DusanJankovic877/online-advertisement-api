<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;

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
Route::group([

    'middleware' => 'api'

], function ($router) {
    Route::get('get-advertisements', [ AdvertisementController::class, 'index' ]);
    Route::get('get-categories', [ CategoryController::class, 'index' ]);

    Route::post('get-advertisement', [ AdvertisementController::class, 'show' ]);
    Route::get('filter-adverts', [ AdvertisementController::class, 'filterAverts' ]);
    Route::put('edit-advertisement', [ AdvertisementController::class, 'update' ]);
    Route::post('create-advertisement', [ AdvertisementController::class, 'create' ]);
    Route::delete('delete-advertisement/{id}', [ AdvertisementController::class, 'destroy' ]);

});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [ AuthController::class, 'register' ]);
    Route::post('login', [ AuthController::class, 'login' ]);
    Route::post('logout', [ AuthController::class, 'logout' ]);
    Route::post('refresh', [ AuthController::class, 'refresh' ]);
    Route::post('me', [ AuthController::class, 'me' ]);

});