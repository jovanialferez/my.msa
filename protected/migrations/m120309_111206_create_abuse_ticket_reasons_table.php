<?php

class m120309_111206_create_abuse_ticket_reasons_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('abuse_ticket_reasons', array(
			'id' => 'pk',
			'value' => 'text',
		));
		
		// just some sample/dummy data
		$this->insert('abuse_ticket_reasons', array('value' => 'first reason'));
		$this->insert('abuse_ticket_reasons', array('value' => 'whatever reason'));
		$this->insert('abuse_ticket_reasons', array('value' => 'dumb reason'));
		$this->insert('abuse_ticket_reasons', array('value' => 'lorem ipsum'));
	}

	public function down()
	{
		$this->dropTable('abuse_ticket_reasons');
	}
}