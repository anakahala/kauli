<?php

namespace Fuel\Migrations;

class Create_kaumonos
{
	public function up()
	{
		\DBUtil::create_table('kaumonos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'is_buy' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('kaumonos');
	}
}