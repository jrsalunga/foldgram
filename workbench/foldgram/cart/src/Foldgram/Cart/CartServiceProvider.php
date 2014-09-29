<?php 

namespace Foldgram\Cart;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	/*
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	/*
	public function provides()
	{
		return array();
	}




	/**
	* Bootstrap the application events.
	*
	* @return void
	*/
	public function boot(){
		$this->package('foldgram/cart');
	}

	/**
	* Register the service provider.
	*
	* @return void
	*/
	public function register() {
		$this->app['Cart'] = $this->app->share(function($app){
			return new Cart($this->app['session']);
		});
	}
	
	/**
	* Get the services provided by the provider.
	*
	* @return array
	*/
	public function provides(){
		return array('Cart');
	}

}
