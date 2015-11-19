<?php

class AuthController extends BaseController
{
	public function getLogin()
	{
		return View::make('auth.login');
	}
	
	public function postLogin()
	{
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
		);
		
		if(Auth::attempt($credentials))
		{
			if(Auth::getUser()->email== 'admin@test.com')
				return Redirect::to('users');
			else
				return Redirect::to('products');
		}
		else
		{
			return Redirect::to('login')->withInput();
		}
	}
	
	public function getLogout()
	{
		Auth::logout();
		
		return Redirect::to('');
	}
}