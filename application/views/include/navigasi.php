<ul class="nav nav-pills">
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
	<li><?php echo anchor("master","Master"); ?></li>
	<li><?php echo anchor("transaction","Transaction"); ?></li>
	<li><?php echo anchor("accounting","Accounting"); ?></li>
	<li><?php echo anchor("operasional","Operasional"); ?></li>
	<li><?php echo anchor("report","Report"); ?></li>
	<li class='pull-right'><?php echo anchor("users","Users"); ?></li>
</ul>