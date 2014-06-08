<?php
	/* File ini merupakan container utama, dari sini view dipanggil kembali pada div content sesuai dengan view yang diparsing dari controller */
?>
<!Doctye html>
<html>
	<head>
		<title> ICS </title>
		<?php 
			echo "<script src='".base_url()."common/js/bootstrap.js'></script>";
			echo link_tag(base_url().'common/css/bootstrap.css');
			echo link_tag(base_url().'common/css/bootstrap-theme.css');
			echo link_tag(base_url().'common/css/template.css');
		?>
	</head>
	<body>
		<center>
		<div class='header'>
			<div class='container'>
				<div class='logo text-left'>Integrated Cargo System</div>
			</div>
		</div>
		<?php if(!empty($msg))
		{
			echo "<div class='alert alert-".(!empty($style) ? $style : "info")."'>".$msg."</div>";
		}?>
		<div class='content'>
			<div class='boxLogin boxContent'>
				<h3>Administrator Login</h3>
				<?php 
					echo form_open("users/login");
					echo form_input('username','',"class='form-control' placeholder='Username'");
					echo form_password('password','',"class='form-control' placeholder='Password'");
					echo form_submit("submit","Login","class='form-control btn btn-success'");
					echo form_close(); 
				?>
			</div>
		</div>
		
		<div class='footer'>
			<div class='container'>
				Copyright &copy; 2014 | Inisial Group
			</div>
		</div>
		</center>
	</body>
</html>
