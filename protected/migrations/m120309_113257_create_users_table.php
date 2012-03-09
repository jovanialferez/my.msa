<?php

class m120309_113257_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
			'id' => 'pk',
			'username' => 'string',
			'password' => 'string',
		));
		
		// sample data for simplified demo and testing
		$this->insert('users', array( 'username' => 'joe', 'password' => 'test1234' ));
		$this->insert('users', array( 'username' => 'jane', 'password' => 'test1234' ));
		$this->insert('users', array( 'username' => 'donald', 'password' => 'test1234' ));
	}

	public function down()
	{
		$this->dropTable('users');
	}
}