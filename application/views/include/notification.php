<div class='boxContent'>
	<?php echo anchor("dashboard","Pembagian Tugas Project"); ?>
</div>

<div class='alert alert-danger'>Untuk mengaktifkan library log (lihat aplication/library/log), </div>
<div class='alert alert-info'>contoh penggunaan log pada controller master/company</div>

<div class='boxContent' id='log'>
	<?php
		
		
		$logs = $this->log->get(5);
		foreach($logs as $log)
		{
			echo "<p><b>".$log['user_id']."</b> <i>".$log['description']."</i> <small>[".$log['datetime']."]</small></p>";
		}
	?>
</div>