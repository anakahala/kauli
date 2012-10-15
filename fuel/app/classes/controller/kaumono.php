<?php
class Controller_Kaumono extends Controller_Template
{

	public function action_index()
	{
		$data['kaumonos'] = Model_Kaumono::find('all');
		$this->template->title = "Kaumonos";
		$this->template->content = View::forge('kaumono/index', $data);

	}

	public function action_view($id = null)
	{
		$data['kaumono'] = Model_Kaumono::find($id);

		is_null($id) and Response::redirect('Kaumono');

		$this->template->title = "Kaumono";
		$this->template->content = View::forge('kaumono/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Kaumono::validate('create');

			if ($val->run())
			{
				$kaumono = Model_Kaumono::forge(array(
					'name' => Input::post('name'),
					'is_buy' => Input::post('is_buy'),
				));

				if ($kaumono and $kaumono->save())
				{
					Session::set_flash('success', 'Added kaumono #'.$kaumono->id.'.');

					Response::redirect('kaumono');
				}

				else
				{
					Session::set_flash('error', 'Could not save kaumono.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Kaumonos";
		$this->template->content = View::forge('kaumono/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Kaumono');

		$kaumono = Model_Kaumono::find($id);

		$val = Model_Kaumono::validate('edit');

		if ($val->run())
		{
			$kaumono->name = Input::post('name');
			$kaumono->is_buy = Input::post('is_buy');

			if ($kaumono->save())
			{
				Session::set_flash('success', 'Updated kaumono #' . $id);

				Response::redirect('kaumono');
			}

			else
			{
				Session::set_flash('error', 'Could not update kaumono #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$kaumono->name = $val->validated('name');
				$kaumono->is_buy = $val->validated('is_buy');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('kaumono', $kaumono, false);
		}

		$this->template->title = "Kaumonos";
		$this->template->content = View::forge('kaumono/edit');

	}

	public function action_delete($id = null)
	{
		if ($kaumono = Model_Kaumono::find($id))
		{
			$kaumono->delete();

			Session::set_flash('success', 'Deleted kaumono #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete kaumono #'.$id);
		}

		Response::redirect('kaumono');

	}


}