<?php


namespace Foldgram\Cart;

use Illuminate\Support\Facades\Facade;

class Cart extends Facade {

	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor() { return 'cart'; }

	public static function message() {
		echo "hello world from cart package";
	
	}

}