<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Middleware\AdminCheck;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

$verificationLimiter = config('fortify.limiters.verification', '6,1');

Route::group(
	['prefix' => config('app.apiversion'),
	'as' => config('app.apiversion'), ],
	function() {
		$limiter = config('fortify.limiters.login');

		Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware(array_filter([
			'guest:'.config('fortify.guard'),
			$limiter ? 'throttle:'.$limiter : null,
		]));

		Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest:'.config('fortify.guard')]);

		Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware(['guest:'.config('fortify.guard')])->name('password.email');
		
		Route::group(['middleware' => [AdminCheck::class]], function () {
			// Маршруты, требующие прав администратора
			Route::post('/products/create', [ProductController::class, 'store']);
			Route::post('/products/{product}/edit', [ProductController::class, 'update']);
			Route::post('/products/{product}/remove', [ProductController::class, 'destroy']);
		
		});

		Route::middleware(['auth:sanctum'])->group(function () {

			Route::post('/users/list', [UserController::class, 'list'])->name('users.list');
			Route::post('/products/show/{product}', [ProductController::class, 'show']);
			Route::post('/products/list', [ProductController::class, 'list']);
		});

});