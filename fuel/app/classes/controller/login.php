<?php
use Fuel\Core\Controller_Template;

class Controller_login extends Controller_Template 
{
	public function action_index()
	{
		$this->template->title = "ログイン";
		$this->template->content = View::forge('login/index');
	}	
}
?>
