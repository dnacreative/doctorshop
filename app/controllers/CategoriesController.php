<?php

class CategoriesController extends BaseController {

	public function getIndex()
	{
		$categories = Category::all();
	
		return View::make('categories.index')->with('categories', $categories);
	}
	
	public function getAdmin()
	{
		$categories = Category::all();
	
		return View::make('categories.admin')->with('categories', $categories);
	}
	
	public function getView($category_name)
	{
		$category = Category::where('name', '=', $category_name)->take(1)->get();
		$category_id = $category[0]->id;
		$products = Product::where('category_id', '=', $category_id)->get();
	
		return View::make('products.index')->with('products', $products)->with('category_name', $category_name);
	}
	
	public function getCreate()
	{
		return View::make('categories.create');
	}
	
	public function postCreate()
	{
		$category = new Category();
		$category->name = Input::get('category_name');
		$category->save();
		
		$picture = Input::file('picture');
		if(isset($picture))
		{
			$destination = 'img/categories';
			$filename = $category->id.'.jpg';
			$picture->move($destination, $filename);
		}
		
		return Redirect::to('categories');
	}
	
	public function getUpdate($category_id)
	{
		$category = Category::find($category_id);
		
		if(is_null($category))
		{
			return Redirect::to('category');
		}
		
		return View::make('categories.update')->with('category', $category);
	}
	
	public function postUpdate($category_id)
	{
		$category = Category::find($category_id);
		
		if(is_null($category))
		{
			return Redirect::to('category');
		}
		
		$category->name = Input::get('category_name');
		$category->save();
		
		$picture = Input::file('picture');
		if(isset($picture))
		{
			$destination = 'img/categories';
			$filename = $category->id.'.jpg';
			$picture->move($destination, $filename);
		}
		
		return Redirect::to('categories');
	}
	
	public function getDelete($category_id) 
	{
		$category = Category::find($category_id);
		
		if(is_null($category))
		{
			return Redirect::to('category');
		}

		$category->delete();
		
		return Redirect::to('categories');
	}

}