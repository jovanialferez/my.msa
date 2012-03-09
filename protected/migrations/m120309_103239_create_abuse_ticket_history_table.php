<?php

class m120309_103239_create_abuse_ticket_history_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('abuse_ticket_history', array(
			'id' => 'pk',
			'ticket_id' => 'integer',
			'moderator_id' => 'integer',
			'comment' => 'text',
			'state_id' => 'integer',
			'timestamp' => 'timestamp',
		));
	}

	public function down()
	{
		$this->dropTable('abuse_ticket_history');
	}
}