<div>
	<h2 class='page-header'>Add / Edit Data</div>
	<form class="form-horizontal" role="form">
		<?php foreach($table as $key=>$val) { ?>
			 <div class="form-group">
				<label class="col-sm-2 control-label"><?php echo ucfirst($key); ?></label>
				<div class="col-sm-10">
					<?php switch($val)
					{
						case "textarea":
						echo '<textarea name="'.$key.'" placeholder="'.ucfirst($key).'" class="form-control"></textarea>';
						break;
						
						default :
						echo '<input type="text" class="form-control" name="'.$key.'"  placeholder="'.ucfirst($key).'">';
						break;
					}
					?>
				 
				</div>
			  </div>
		<?php } ?>
	</form>
	
	
</div>