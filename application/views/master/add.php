
	<div class='boxcontent row'>
		<h2 class='pull-left'>Add / Edit Data</h2>
		<div class='pull-right'><?php echo form_submit('submit','Simpan Data','class="btn btn-success" form="masterform"'); ?><?php echo anchor('master','Kembali','class="btn btn-warning"'); ?></div>
	</div>
	<div class='boxContent'>
	<form class="form-horizontal" role="form" action="<?php echo site_url($page); ?>" method="post" id='masterform'>
		<?php foreach($structure as $key=>$val) { ?>
			 <div class="form-group">
				<label class="col-sm-2 control-label"><?php echo ucfirst($key); ?></label>
				<div class="col-sm-10">
					<?php 
						echo $this->inputfields->$val($key,(!empty($data[$key]) ? $data[$key] : ""),"placeHolder='".ucfirst($key)."' class='form-control'");
					?>
				</div>
			  </div>
		<?php } ?>
		<?php echo form_hidden('action','save'); ?>
		<?php echo form_hidden('id',(!empty($data['id']) ? $data['id'] : "")); ?>
	</form>
	</div>