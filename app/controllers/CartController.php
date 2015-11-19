<?php

class CartController extends BaseController {

	public function getIndex()
	{
		// $carts = Cart::where('user_id', '=', Auth::user()->id)->get();

		$carts = DB::table('transactions')
				 ->join('products', 'transactions.product_id', '=', 'products.id')
				 ->where('user_id', '=', Auth::user()->id)
				 ->where('status', '=', Product::PENDING)
				 ->select('transactions.*', 'products.name', 'products.price')
				 ->get();

		$histories = DB::table('transactions')
				 	->join('products', 'transactions.product_id', '=', 'products.id')
				 	->where('user_id', '=', Auth::user()->id)
				 	->where('status', '=', Product::CHECKED_OUT)
				 	->select('transactions.*', 'products.name', 'products.price')
				 	->get();

		$total_price = 0;

		foreach ($carts as $cart) {
			$total_price += $cart->price;
		}
	
		return View::make('carts.index')->with('carts', $carts)
										->with('histories', $histories)
										->with('total_price', $total_price);
	}

	public function getAdmin()
	{
		$histories = DB::table('transactions')
				 ->join('products', 'transactions.product_id', '=', 'products.id')
				 ->join('users', 'transactions.user_id', '=', 'users.id')
				 ->select('transactions.*', 'users.real_name', 'products.name', 'products.price')
				 ->get();

		$total_income = 0;

		foreach ($histories as $history) {
			if( $history->status > 0 ) {
				$total_income += $history->price;
			}
		}

		return View::make('carts.admin')->with('histories', $histories)
										->with('total_income', $total_income);
	}

	public function getCheckout($transaction_id)
	{
		DB::table('transactions')->where('id', '=', $transaction_id)
								 ->update(array(
								 	'status' => Product::CHECKED_OUT,
								 ));

		return Redirect::to('cart');
	}

	public function getCancel($transaction_id)
	{
		DB::table('transactions')->where('id', '=', $transaction_id)
								 ->update(array(
								 	'status' => Product::CANCELED,
								 ));

		return Redirect::to('cart');
	}

}