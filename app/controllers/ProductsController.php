<?php

class ProductsController extends BaseController {

	public function getIndex()
	{
		$products = Product::orderBy('id', 'DESC')->get();
	
		return View::make('products.index')->with('products', $products);
	}
	
	public function getAdmin()
	{
		$products = Product::orderBy('id', 'DESC')->get();
	
		return View::make('products.admin')->with('products', $products);
	}
	
	public function getCreate()
	{
		$categories = Category::all();
		return View::make('products.create')->with('categories', $categories);
	}
	
	public function postCreate()
	{
		$product = new Product();
		$product->name = Input::get('product_name');
		$product->price = Input::get('price');
		$product->category_id = Input::get('category');
		$product->save();
		
		$picture = Input::file('picture');
		if(isset($picture))
		{
			$destination = 'img/products';
			$filename = $product->id.'.jpg';
			$picture->move($destination, $filename);
		}
		
		return Redirect::to('products');
	}
	
	public function getUpdate($product_id)
	{
		$product = Product::find($product_id);
		$categories = Category::all();
		
		if(is_null($product))
		{
			return Redirect::to('product');
		}
		
		return View::make('products.update')->with('product', $product)->with('categories', $categories);
	}
	
	public function postUpdate($product_id)
	{
		$product = Product::find($product_id);
		
		if(is_null($product))
		{
			return Redirect::to('Product');
		}
		
		$product->name = Input::get('product_name');
		$product->price = Input::get('price');
		$product->category_id = Input::get('category');
		$product->save();
		
		$picture = Input::file('picture');
		if(isset($picture))
		{
			$destination = 'img/products';
			$filename = $product->id.'.jpg';
			$picture->move($destination, $filename);
		}
		
		return Redirect::to('products');
	}
	
	public function getDelete($product_id) 
	{
		$product = Product::find($product_id);
		
		if(is_null($product))
		{
			return Redirect::to('Product');
		}

		$product->delete();
		
		return Redirect::to('products');
	}

	public function getBuy($product_id)
	{
		$user_id = Auth::user()->id;
//		$date = new DateTime();
		
		DB::table('transactions')->insert(
			array(
				'user_id' => $user_id, 
				'product_id' => $product_id,
				'status' => Product::PENDING,
				'created_at' => time(),
			)
		);
		
		return Redirect::to('cart');
	}
}