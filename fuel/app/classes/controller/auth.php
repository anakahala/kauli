<?php
use Fuel\Core\View;

use Fuel\Core\Response;

class Controller_Auth extends NinjAuth\Controller
{
	public function action_logout() {
		Auth::logout();
		Session::set_flash('flash_message', 'ログアウトしました');
		Response::redirect('/');
	}
	
	public function action_linked() {
		Session::set_flash('flash_message', 'アカウントの紐付けをしました');
		Response::redirect('/');
	}
	
	public function action_register() {
		$user_hash = Session::get('ninjauth.user');
		$authentication = Session::get('ninjauth.authentication');
		
		// Working with what?
		$strategy = NinjAuth\Strategy::forge($authentication['provider']);
		
		// username等を取得
		$username = Arr::get($user_hash, 'nickname');
		$full_name = Arr::get($user_hash, 'name');

		if (empty($username) or empty($full_name)) {
			Session::set_flash('flash_message', 'error!!');
			Response::redirect('/');
		} else {
			$user_id = $strategy->adapter->create_user(array(
					'username' => $username,
					'full_name' => $full_name,
					'email' => 'dummy@dummy.d',
					'password' => Str::random('alnum', 16),
			));
				
			if ($user_id) {
				NinjAuth\Model_Authentication::forge(array(
				'user_id' => $user_id,
				'provider' => $authentication['provider'],
				'uid' => $authentication['uid'],
				'access_token' => $authentication['access_token'],
				'secret' => $authentication['secret'],
				'refresh_token' => $authentication['refresh_token'],
				'expires' => $authentication['expires'],
				'created_at' => time(),
				))->save();
					
				Session::set_flash('ninjauth.user_id', $user_id);
				Response::redirect(static::$registered_redirect);
			}
		}
	}
}
?>