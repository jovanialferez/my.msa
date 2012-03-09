<table>
	<thead>
		<th>Timestamp</th>
		<th>State</th>
		<th>Comments</th>
	</thead>
	<?php foreach( $histories as $history ) : ?>
	<tr>
		<td><?php echo $history->timestamp; ?></td>
		<td><?php echo $history->state->value; ?></td>
		<td><?php echo $history->comment; ?></td>
	</tr>
	<?php endforeach; ?>
</table>