<!Doctye html>
<html>
	<head>
		<title> ICS </title>
		<?php 
			echo "<script src='".base_url()."common/js/jquery-1.11.1.min.js'></script>";
			echo "<script src='".base_url()."common/js/jquery.dataTables.js'></script>";
			echo "<script src='".base_url()."common/js/bootstrap.js'></script>";
			echo "<script src='".base_url()."common/js/ics.js'></script>";
			echo link_tag(base_url().'common/css/bootstrap.css');
			echo link_tag(base_url().'common/css/bootstrap-theme.css');
			echo link_tag(base_url().'common/css/jquery.dataTables.css');
			echo link_tag(base_url().'common/css/template.css');
		?>
	</head>
	<body>
		<div class='container'>
			<div class='navigasi'>
				<?php echo $this->load->view("include/navigasi"); ?>
			</div>
			<div class='content'>
				<?php echo (!empty($view) ? $this->load->view($view,(!empty($dataview) ? $dataview : "")) : ""); ?>
			</div>
		</div>
	</body>
</html>
