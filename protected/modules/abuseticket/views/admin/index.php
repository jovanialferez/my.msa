<?php
$this->breadcrumbs=array(
	'Admin',
);?>

<!-- will be using table to make simple for now -->
<table>
	<thead>
		<th>Ticket Id</th>
		<th>State</th>
		<th>Issuer</th>
		<th>Target Type</th>
		<th>Target Id</th>
		<th>Target Tickets</th>
		<th>Reason</th>
		<th>Moderator</th>
		<th>Last Changed</th>
	</thead>
	<?php foreach( $tickets as $ticket ) : ?>
	<tr>
		<td><?php echo CHtml::link($ticket->id, CHtml::normalizeUrl(array( '/abuseticket/admin/show/', 'id'=>$ticket->id ))); ?></td>
		<td><?php echo ($ticket->latestHistory) ? $ticket->latestHistory->state->value : 'open' ?></td>
		<td><?php echo $ticket->issuer->username; ?></td>
		<td><?php echo $ticket->target_type; ?></td>
		<td><?php echo $ticket->target_id; ?></td>
		<td>
			<?php
				switch( $ticket->target_type ){
					case 'profile':
						echo User::model()->findByPk($ticket->target_id)->abuseticketsCount;
						break;
					case 'message':
						// should be from another module
						break;
					case 'discussion':
						// should be from another module
						break;
				}
			?>
		</td>
		<td><?php echo $ticket->reason->value; ?></td>
		<td><?php echo ($ticket->latestHistory) ? $ticket->latestHistory->moderator->username : '--' ?></td>
		<td><?php echo ($ticket->latestHistory) ? $ticket->latestHistory->timestamp : '--' ?></td>
	</tr>
	<?php endforeach; ?>
</table>
