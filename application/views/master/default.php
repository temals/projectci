<div>
	<h2 class='page-header'>Master</h2>
	<div class='toolbar pull-right'>
		<?php echo anchor("master/company/add","<button class='btn btn-success'>Add New</button>"); ?>
	</div>
	<?php 
	//mengecek apakah terdapat data
	if(!empty($data)) { 
	?>
	
	<table class='table table-striped'>
		<thead>
			<?php foreach($table as $th)
			{
				echo "<th>".$th."</th>";
			}
			?>
		</thead>
		<tbody>
			<?php
			foreach($data as $data)
			{

				foreach($table as $key=>$val)
				{
					echo "<td>";
					echo "<th>".$data[$key]."</th>";
					echo "<td>";
				}

			}
			?>
		</tbody>
	</table>
	
	<?php } else { echo "Maaf, Data Belum Tersedia"; } ?>
	
</div>