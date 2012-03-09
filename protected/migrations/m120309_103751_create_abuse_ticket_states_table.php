<?php

class m120309_103751_create_abuse_ticket_states_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('abuse_ticket_states', array(
			'id' => 'pk',
			'value' => 'string',
		));
		
		//pre-defined data
		$this->insert('abuse_ticket_states', array('value' => 'open' ));
		$this->insert('abuse_ticket_states', array('value' => 'close' ));
		$this->insert('abuse_ticket_states', array('value' => 'declined' ));
		$this->insert('abuse_ticket_states', array('value' => 'ongoing' ));
		$this->insert('abuse_ticket_states', array('value' => 'attention' ));
		
	}

	public function down()
	{
		$this->dropTable('abuse_ticket_states');
	}
}