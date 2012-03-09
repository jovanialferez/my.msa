<?php
$this->breadcrumbs=array(
	'Admin'=>array('/abuseticket/admin'),
	'Show',
);?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'abuse-ticket-_abuseticket-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php 
	//echo $form->hiddenField($model, 'moderator_id', array( 'value' => Yii::app()->user->id )); 
	// dummy
	echo $form->hiddenField($model, 'moderator_id', array( 'value' => 1 )); 
?>
<?php echo $form->hiddenField($model, 'ticket_id', array( 'value' => $ticket->id ));  ?>
<table>
	<thead>
		<th>Ticket Id</th>
		<th><?php echo $ticket->id; ?></th>
	</thead>
	<tr>
		<td>State</td>
		<td><?php echo $form->dropDownList($model, 'state_id', CHtml::listData(AbuseTicketState::model()->findAll(), 'id', 'value')); ?></td>
	</tr>
	<tr>
		<td>Issuer</td>
		<td><?php echo $ticket->issuer->username; ?></td>
	</tr>
	<tr>
		<td>Target Type</td>
		<td><?php echo $ticket->target_type; ?></td>
	</tr>
	<tr>
		<td>Target Id</td>
		<td><?php echo $ticket->target_id; ?></td>
	</tr>
	<tr>
		<td>Reason</td>
		<td><?php echo $ticket->reason->value; ?></td>
	</tr>
	<tr>
		<td>Comment</td>
		<td><?php echo $ticket->comment; ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo $ticket->create_timestamp; ?></td>
	</tr>
	<tr>
		<td>Archived</td>
		<td><?php echo CHtml::activeCheckBox($ticket, 'archived'); ?></td>
	</tr>
	
	<tr>
		<td>Your Comments</td>
		<td><?php echo $form->textArea($model,'comment'); ?></td>
	</tr>
</table>

<?php echo CHtml::submitButton('Submit'); ?>

<?php $this->endWidget(); ?>

<!-- states changes and history -->
<?php $this->renderPartial('_history', array( 'histories' => $ticket->history )); ?>
