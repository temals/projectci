<div class='boxContent'>
	Tidak Ada Notification
</div>

<div class='boxContent' id='log'>
	<?php
		
		
		$logs = $this->log->get(5);
		foreach($logs as $log)
		{
			echo "<p><b>".$log['user_id']."</b> <i>".$log['description']."</i> <small>[".$log['datetime']."]</small></p>";
		}
	?>
</div>