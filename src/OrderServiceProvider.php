<?php

namespace Wooturk;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class OrderServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Route::get('/order', [UserController::class, 'index'])->name('order-index');
		Route::group(['middleware' => ['auth:sanctum','wooturk.gateway']], function(){
			Route::post('/order', [UserController::class, 'post'])->name('order-create');
			Route::get('/orders', [UserController::class, 'list'])->name('order-list');
			Route::get('/order/{id}', [UserController::class, 'get'])->name('order-get');
			Route::put('/order/{id}', [UserController::class, 'put'])->name('order-update');
			Route::delete('/order/{id}', [UserController::class, 'delete'])->name('order-delete');
		});
	}
}
