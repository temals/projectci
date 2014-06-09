<?php
//hak akses users
//disesuaikan dengan halaman dan actionnya view | add | edit | delete
$is_allow = $this->privilege->is_allow($page,"view");
if($is_allow == "allow"):
?>
<div class='boxContent row'>
	<h2 class='pull-left'><?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2)); ?></h2>
	<div class='pull-right'><?php echo anchor($page."/add","<button class='btn btn-success'>Add New</button>"); ?></div>
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
				echo "<td><div class='btn-group'>
				<button class='btn dropdown-toggle btn-default' data-toggle='dropdown'>Action<span class='caret'></span></button>
					<ul class='dropdown-menu'>								
						<li>".anchor($page.'/add/'.$row['id'],'<i class="icon-user"></i>Edit')."</li>
						<li>".anchor($page.'/delete/'.$row['id'],'<i class="icon-remove-sign"></i>Delete','class="deleteData"')."</li>
					</ul>
				</div></td>";
				echo "</tr>";	
			}
			?>
		</tbody>
	</table>
	
	<?php } else { echo "Maaf, Data Belum Tersedia"; } ?>
	
</div>
<?php
	else:
		$this->load->view("include/unautorized");
	endif;
?>