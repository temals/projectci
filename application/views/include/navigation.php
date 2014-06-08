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
					<li><?php echo anchor("master/location","Location"); ?></li>
					<li><?php echo anchor("master/price","Price"); ?></li>
				</ul>
			</a>
		</li>
		<li><?php echo anchor("#","Transaction"); ?></li>
		<li><?php echo anchor("#","Accounting"); ?></li>
		<li><?php echo anchor("#","Operasional"); ?></li>
		<li><?php echo anchor("#","Report"); ?></li>
	</ul>
	<div class='pull-right'><?php echo anchor("users","Users"); ?></div>
</div>