<div class='boxContent row'>
	<h2 class='pull-left'>Transaction</h2>
	<div class='pull-right'><?php echo anchor("transaction/index/add","<button class='btn btn-success'>Add New</button>"); ?></div>
</div>
<div class='boxContent'>
	<?php 
	
	//mengecek apakah terdapat data
	if(!empty($data)) { 
	?>
	
	<table class='table table-striped'>
		<thead>
			<?php foreach($structure as $th)
			{
				echo "<th>".$th."</th>";
			}
			echo "<th>action</th>";
			?>
		</thead>
		<tbody>
			<?php
			foreach($data as $row)
			{
				echo "<tr>";
				foreach($structure as $key=>$val)
				{
					echo "<td>".$row[$key]."</td>";
				}
				echo "<td>".anchor($page."/add/".$row['id'],"Edit")." | ".anchor($page."/delete/".$row['id'],"Delete")."</td>";
				echo "</tr>";	
			}
			?>
		</tbody>
	</table>
	
	<?php } else { echo "Maaf, Data Belum Tersedia"; } ?>
	
</div>