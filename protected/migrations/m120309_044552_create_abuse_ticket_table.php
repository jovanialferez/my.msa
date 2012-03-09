<?php

class m120309_044552_create_abuse_ticket_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('abuse_ticket', array(
			'id' => 'pk',
			'create_timestamp' => 'timestamp',
			'issuer_id' => 'integer',
			'target_type' => 'string',
			'target_id' => 'integer',
			'reason_id' => 'integer',
			'comment' => 'text',
			'archived' => 'boolean',
		));
	}

	public function down()
	{
		$this->dropTable('abuse_ticket');
	}
}