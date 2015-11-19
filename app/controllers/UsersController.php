<?php

class UsersController extends BaseController {

	public function __construct()
	{
		// $this->beforeFilter(function()
        // {
			// if(Auth::guest() || Auth::getUser()->email != 'admin@test.com') return Redirect::to('error');
        // });
	}
	
	public function getIndex()
	{
		if(Auth::guest() || Auth::getUser()->email != 'admin@test.com') return Redirect::to('error');
	
		$users = User::orderBy('id', 'DESC')->get();
	
		return View::make('users.index')->with('users', $users);
	}
	
	public function getCreate()
	{
		return View::make('users.create');
	}
	
	public function postCreate()
	{
		// validate input
		$rules = array(
			'first_name' => 'required|max:50',
			'last_name' => 'required|max:50',
			'email' 	=> 'required|email|unique:users',
			'password'  => 'required|min:5'
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
		{
			return Redirect::back()->withInput()
					->withErrors($validation);
		}
	
		// create a user
		$user = new User();
		$user->real_name = Input::get('first_name')." ".Input::get('last_name');
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->save();
		
		$credit_card = new CreditCard();
		$credit_card->user_id = $user->id;
		$credit_card->number = Input::get('credit_card');
		$credit_card->save();
		
		return Redirect::to('users');
	}
	
	public function getUpdate($user_id)
	{
		$user = User::find($user_id);
		
		if(is_null($user))
		{
			return Redirect::to('users');
		}
		
		return View::make('users.update')->with('user', $user);
	}
	
	public function postUpdate($user_id)
	{
		$user = User::find($user_id);
		
		if(is_null($user))
		{
			return Redirect::to('users');
		}
		
		$user->real_name = Input::get('real_name');
		$user->email = Input::get('email');
		$user->credit_card->number = Input::get('credit_card');
		
		if(Input::has('password'))
		{
			$user->password = Input::get('password');
		}
		
		$user->save();
		$user->credit_card->save();
		
		return Redirect::to('users');
	}
	
	public function getDelete($user_id) 
	{
		$user = User::find($user_id);
		
		if(is_null($user))
		{
			return Redirect::to('users');
		}

		$user->delete();
		
		return Redirect::to('users');
	}

}