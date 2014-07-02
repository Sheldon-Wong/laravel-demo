<?php

class CartController extends BaseController {

	public function show()
	{
		$userId = Auth::id();

		$cartItems = CartItem::where('owner', '=', $userId)->get();
		
		if (!($total = CartItem::where('owner', '=', $userId)->sum('totalPrice'))) {
			$total = 0;
		}

		return View::make('cart')->with(array('cartItems' => $cartItems, 'total' => $total));
	}

	public function store()
	{
		$userId = Auth::id();

		$cart = new CartItem;

		$cart->owner = $userId;

		$cart->item = Input::get('id');

		$price = Movie::find( $cart->item )->unitPrice;

		$cart->quantity = 1;

		$cart->totalPrice = $price * $cart->quantity;

		$cart->save();
	}

	public function update($cartItemId)
	{

		//无需更新

	}

	public function destroy($cartItemId)
	{
		$userId = Auth::id();

		$cart = CartItem::where('owner', '=', $userId)->where('item', '=', $cartItemId)->first();
		
		$cart->delete();

	}

}