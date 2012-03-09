<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'abuse-ticket-_abuseticket-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<?php echo $form->hiddenField($model, 'issuer_id', array( 'value' => Yii::app()->user->id )); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'target_type'); ?>
		<?php //echo $form->textField($model,'target_type'); ?>
		<?php echo $form->dropDownList($model, 'target_type', array( 
																														AbuseTicket::TARGET_PROFILE => 'profile',
																														AbuseTicket::TARGET_MESSAGE => 'message',
																														AbuseTicket::TARGET_DISCUSSION => 'discussion',
																													));
		?>
		<?php echo $form->error($model,'target_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target_id'); ?>
		<?php //echo $form->textField($model,'target_id'); ?>
		<!-- @TODO: should change with whatever is selected from target type -->
		<?php echo $form->dropDownList($model, 'target_id', CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
		<?php echo $form->error($model,'target_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason_id'); ?>
		<?php //echo $form->textField($model,'reason_id'); ?>
		<?php echo $form->dropDownList($model, 'reason_id', CHtml::listData(AbuseTicketReason::model()->findAll(), 'id', 'value')); ?>
		<?php echo $form->error($model,'reason_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment'); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->