<?php
class Controller_Kaumono_M extends Controller
{

	public function action_index()
	{
		$data['kaumonos'] = Model_Kaumono::find('all');
		return View::forge('kaumono/m/index', $data);
	}
}