<?php

class AdminController extends Controller
{
	public function actionIndex()
	{
		$tickets = AbuseTicket::model()->findAll();
		
		$this->render('index', array( 'tickets' => $tickets ));
	}

	public function actionShow($id)
	{
		//echo $id;
		$model = new AbuseTicketHistory;
		
		if(isset($_POST['AbuseTicketHistory'])) {
    	$model->attributes=$_POST['AbuseTicketHistory'];
    	
    	if($model->validate()) {
    		$model->save();
				$model->unsetAttributes(); // to display a clean form again
			}
		}
		
		$ticket = AbuseTicket::model()->with('history')->findByPk($id);
		
		if( isset($_POST['AbuseTicket']['archived']) ) {
			$ticket->archived = 1;
			$ticket->update();
		}
		
		if( $ticket->latestHistory ) {
			$model = $ticket->latestHistory;
		}
		
		$this->render('show', array( 'ticket' => $ticket, 'model' => $model ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}