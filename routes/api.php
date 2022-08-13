<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\UserController;

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
    Route::get('get-advertisements-by-category', [ AdvertisementController::class, 'getAdvertisementsByCategory' ]);
    Route::get('get-advertisements-by-title', [ AdvertisementController::class, 'getAdvertisementsByTitle' ]);
    Route::get('get-advertisements-by-price', [ AdvertisementController::class, 'getAdvertisementsByPrice' ]);
    Route::get('get-users-advertisements', [ UserController::class, 'getUsersAdvertisements' ]);
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