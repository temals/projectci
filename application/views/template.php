<?php
	/* File ini merupakan container utama, dari sini view dipanggil kembali pada div content sesuai dengan view yang diparsing dari controller */
?>
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
		<div class='header'>
			<div class='container'>
				<?php echo $this->load->view("include/navigation"); ?>
			</div>
		</div>
		<div class='content'>
			<div class='container'>
				<div class='row'>
					<div class='col-md-10'>
                        <?php echo (!empty($alert) ? "<div class='alert alert-".(!empty($alert['type']) ? $alert['type'] : "info")."'>".$alert['msg']."</div>" : ""); ?>
						<?php echo (!empty($view) ? $this->load->view($view) : ""); ?>
					</div>
					<div class='col-md-2'>
						<?php echo $this->load->view("include/notification"); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class='footer'>
			<div class='container'>
				Copyright &copy; 2014 | Inisial Group
			</div>
		</div>
	</body>
</html>
