<h2 class="boxContent">Report-Log</h2>

<div class="boxContent">
<?php if(!empty($data)) { ?>

	<table class="table table-striped dataTables">
	<thead>
	<tr>
<?php
		  foreach($structure as $th)
		{ 
			echo "<th>".$th."</th>";
		}
?>
	</tr>
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
		}
?>
	</tbody>
	</table>

<?php } ?>
</div>
