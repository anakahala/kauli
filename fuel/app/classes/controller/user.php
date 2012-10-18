<?php
use Fuel\Core\Controller_Template;

class Controller_User extends Controller_Template
{
	public function action_index()
	{
		if (Auth::check())
		{
			$this->template->title = "Home";
			$this->template->content = View::forge('user/index');
		} else 
		{
			Session::set_flash('error', 'ログインして下さい。');
			Response::redirect('login/');
		}
	}
}
?>
