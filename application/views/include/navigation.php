<div class='row navigation'>
	<div class='logo pull-left'><a href="<?php echo base_url(); ?>">Integrated Cargo System</a></div>
	<ul class="nav nav-pills pull-left">
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Master <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("master/company","Company"); ?></li>
					<li><?php echo anchor("master/users","Users"); ?></li>
					<li><?php echo anchor("master/unit","Unit"); ?></li>
					<li><?php echo anchor("master/price","Harga"); ?></li>
					<li><?php echo anchor("master/location","Lokasi"); ?></li>
					<li><?php echo anchor("master/coa","COA"); ?></li>
					<li><?php echo anchor("master/vehicle","Kendaraan"); ?></li>
					<li><?php echo anchor("master/faktur_pajak","Faktur Pajak"); ?></li>
				</ul>
			</a>
		</li>
		<li><?php echo anchor("#","Transaction"); ?></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Accounting <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","Jurnal"); ?></li>
					<li><?php echo anchor("#","Invoice"); ?></li>
					<li><?php echo anchor("#","Faktur pajak"); ?></li>
				</ul>
			</a>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Operasional <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","SPPB"); ?></li>
					<li><?php echo anchor("#","Schedule"); ?></li>
				</ul>
			</a>
		</li>
		<li class="dropdown"><?php echo anchor("#","Trace & Tracking"); ?></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Report <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","Transaksi"); ?></li>
					<li><?php echo anchor("#","SPPB"); ?></li>
					<li><?php echo anchor("#","Buku Besar"); ?></li>
				</ul>
			</a>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			  Settings <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><?php echo anchor("#","Profile"); ?></li>
					<li><?php echo anchor("#","General Settings"); ?></li>
					<li><?php echo anchor("#","System Previlage"); ?></li>
				</ul>
			</a>
		</li>
	</ul>
	<div class='pull-right '><?php 
		$user = $this->session->userdata("user");
		
		
		if(!empty($user))
		{
		?>
		<div class="btn-group">
			<button class="btn dropdown-toggle btn-default" data-toggle="dropdown">Hi, <?php echo $user['username']; ?> <span class="caret"></span></button>
				<ul class="dropdown-menu">								
					<li><?php echo anchor('configuration/profile','<i class="icon-user"></i>Profile'); ?></li>
					<li><?php echo anchor('users/logout','<i class="icon-remove-sign"></i>Log Out'); ?></li>
				</ul>
		</div>
		<?php
		} else { echo anchor("users/login","Hi Guest, Login","class='btn btn-default'"); }
		?>
	</div>
</div>