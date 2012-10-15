<?php
use Fuel\Core\View;

use Fuel\Core\Response;

class Controller_Auth extends NinjAuth\Controller
{
	public function action_logout() {
		Auth::logout();
		Session::set_flash('flash_message', 'ログアウトしました');
		Response::redirect('index');
	}
	
	public function action_linked() {
		Session::set_flash('flash_message', 'アカウントの紐付けをしました');
		Response::redirect('oauth/index');
	}
}
?>