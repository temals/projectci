
	<div class='boxcontent row'>
		<h2 class='pull-left'>Add / Edit Data</h2>
		<div class='pull-right'><?php echo form_submit('submit','Simpan Data','class="btn btn-success" form="masterform"'); ?><?php echo anchor('master','Kembali','class="btn btn-warning"'); ?></div>
	</div>
	<div class='boxContent'>
	<form class="form-horizontal" role="form" action="<?php echo site_url($page); ?>" method="post" id='masterform'>
		<div class="form-group">
			<label class="col-sm-2 control-label">Customer</label>
			<div class="col-sm-8">
				<?php 
					echo $this->inputfields->customer_lists("customer_id",(!empty($data['customer_id']) ? $data['customer_id'] : ""),"placeHolder='Customer' class='form-control'");
				?>
			</div>
			<div class="col-md-2"><a href='#' class='btn btn-default'>Add customer</a></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Picking Address</label>
			<div class="col-sm-8">
				<?php 
					echo $this->inputfields->picking_address_lists("customer_id",(!empty($data['customer_id']) ? $data['customer_id'] : ""),"placeHolder='Customer' class='form-control'");
				?>
			</div>
			<div class="col-md-2"><a href='#' class='btn btn-default'>Add customer</a></div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Shipping Address</label>
			<div class="col-sm-8">
				<?php 
					echo $this->inputfields->shipping_address_lists("customer_id",(!empty($data['customer_id']) ? $data['customer_id'] : ""),"placeHolder='Customer' class='form-control'");
				?>
			</div>
			<div class="col-md-2"><a href='#' class='btn btn-default'>Add customer</a></div>
		</div>
		<?php echo form_hidden('action','save'); ?>
		<?php echo form_hidden('id',(!empty($data['id']) ? $data['id'] : "")); ?>
	</form>
	</div>