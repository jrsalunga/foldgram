<?php


namespace Foldgram\Cart;

use Illuminate\Support\Facades\Facade;
use Illuminate\Session\Store as SessionStore;

class Cart extends Facade {

	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor() { return 'cart'; }

	private $session = null;
	private $container = null;
	private $cart_contents = null;


	public function __construct(SessionStore $session){
		$this->session = $session;
		$this->container = 'Foldagram_Cart';
		$this->initializecart();
	}

	public function initializecart(){
		array_set($this->cart_contents, $this->container, $this->session->get($this->container));
		
		if(is_null(array_get($this->cart_contents, $this->container, null))){
			array_set($this->cart_contents, $this->container, array('cart_total' => 0, 'total_items' => 0));
		}
	}


	function validate($item){
	
		if(! is_array($item) or count($item) == 0){
			throw new Foldgram\Cart\CartInvalidDataException;
		}
		
		$required_indexes = array('id', 'qty', 'price', 'name');
		foreach ($required_indexes as $index){
			if (!isset($item[ $index ])) {
				throw new Foldgram\Cart\CartRequiredIndexException
				('Required index [' . $index . '] is missing.');
			}	
		}

		if (!is_numeric($item['qty']) or $item['qty'] == 0){
			throw new Foldgram\Cart\CartInvalidItemQuantityException;
		}

		if (!is_numeric($item['price'])){
			throw new Foldgram\Cart\CartInvalidItemPriceException;
		}
	}


	function insert($item = array()){
		$this->validate($item);
		
		$item['qty'] = (float) $item['qty'];
		$item['price'] = (float) $item['price'];
		
		if (isset($item['id'])){
			$rowid = md5($item['id']);
		}

		$item['rowid'] = $rowid;
		$item['qty'] += (int) array_get($this->cart_contents, $this->container . '.' . $rowid . '.qty', 0);
		array_set($this->cart_contents, $this->container . '.' . $rowid, $item);
		$this->update_cart();
		return $rowid;
	}


	function update_cart(){
		array_set($this->cart_contents, $this->container . '.total_items', 0);
		array_set($this->cart_contents, $this->container . '.cart_total', 0);

		foreach (array_get($this->cart_contents, $this->container) as $rowid => $item){
			if (!is_array($item) or ! isset($item['price']) or !isset($item['qty'])){
				continue;
			}
			
			$this->cart_contents[ $this->container ]['cart_total'] += ($item['price'] * $item['qty']);
			$this->cart_contents[ $this->container ]['total_items'] += $item['qty'];
			
			$subtotal = (
				array_get($this->cart_contents, $this->container .'.' . $rowid . '.price') 
				* array_get($this->cart_contents, $this->container . '.' . $rowid . '.qty')
			);
			
			array_set($this->cart_contents, $this->container . '.' . $rowid .'.subtotal', $subtotal);
		}

		$this->session->put($this->container, array_get($this->cart_contents, $this->container));
		return true;
	}


	function update($item = array()){
		$rowid = array_get($item, 'rowid', null);
		
		if (is_null($rowid)) {
			throw new CartInvalidItemRowIdException;
		}

		if(is_null(array_get($this->cart_contents, $this->container . '.' .	$rowid, null))){
			throw new CartItemNotFoundException;
		}

		$qty = (float) array_get($item, 'qty');
		array_forget($item, 'rowid');
		array_forget($item, 'qty');
		
		if (!is_numeric($qty)){
			throw new CartInvalidItemQuantityException;
		}
		
		if(!empty($item)){
			foreach ($item as $key => $val){
				array_set($this->cart_contents, $this->container .'.'. $rowid .'.'. $key, $val);
			}
		}
		
		if (array_get($this->cart_contents, $this->container .'.'. $rowid .'.qty') == $qty){
			return true;
		}

		if ($qty <= 0){
			array_forget($this->cart_contents, $this->container .'.'. $rowid);
		} else {
			array_set($this->cart_contents, $this->container .'.'. $rowid .'.qty', $qty);
		}
		$this->update_cart();
		return true;
	}

	public function remove($rowid = null){
		if (is_null($rowid)){
			throw new CartInvalidItemRowIdException;
		}

		if($this->update(array('rowid' => $rowid, 'qty' => 0))){
			return true;
		}
	}


	public function contents(){
		$cart = array_get($this->cart_contents, $this->container);
		array_forget($cart, 'total_items');
		array_forget($cart, 'cart_total');
		return $cart;
	}


	public function total(){
		return array_get($this->cart_contents, $this->container .'.cart_total', 0);
	}


	public function destroy(){
		array_set($this->cart_contents, $this->container, array('cart_total'=> 0, 'total_items' => 0));
		$this->session->forget($this->container);
	}

	public function total_items(){
		return array_get($this->cart_contents, $this->container .'.total_items', 0);
	}



	public static function message() {
		echo "hello world from cart package";
	}

}