<?php
/**
* @author sheldon_wong
* @since  2014/6/11
*/
class OrderController extends BaseController {

	public function index()
	{

		if ( Auth::user()->role === 'ADMIN' ) {
			$orders = Order::all();
		 	return View::make('dashboard.orders')->with('orders', $orders);
		} else {
			$orders = Order::where('buyer', '=', Auth::id())->get();
			return View::make('user-orders')->with('orders', $orders);
		}

	}

	public function show($orderId)
	{

		$order = Order::find($orderId)->toJson();
		return $order;

	}

	public function store()
	{

		$orderItems = new OrderItem;
		$user = Auth::id();
		$order = new Order;
		$order->buyer = $user;

		if( Input::get('cartId') ) {

			$cartItems = CartItem::where('owner', '=', $user)->get();
			
			$order->totalPrice = CartItem::where('owner', '=', $user)->sum('totalPrice');
			$order->save();
			foreach ($cartItems as $cartItem) {
				$orderItems->item = $cartItem->item;
				$orderItems->quantity = $cartItem->quantity;
				$orderItems->totalPrice = $cartItem->totalPrice;
				$orderItems->buyer = $cartItem->owner;
				$orderItems->order_id = $order->id;
				$orderItems->save();
				$cartItem->delete();
			}


		} else {

			$order->totalPrice = Movie::find(Input::get('id'))->unitPrice;
			$order->save();
			$orderItems->item = Input::get('id');
			$orderItems->quantity = 1;
			$orderItems->totalPrice = Movie::find(Input::get('id'))->unitPrice;
			$orderItems->buyer = $user;
			$orderItems->order_id = $order->id;
			$orderItems->save();

		}
	}

}
