<!DOCTYPE html5>
<html>
<head>
	<title><?= defined('HEADER_TITLE') ? HEADER_TITLE : "EngTech QR" ?></title>
	<!-- <link rel="shortcut icon" href="<?= base_url()?>public/images/logo-icon.png" type="image/png" sizes="16x16"> -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('plugins/bootstrap4/css/bootstrap.min.css')?>">
	
	<script type="text/javascript" src="<?=base_url('plugins/jquery/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('plugins/qr-scanner/html5-qrcode.js')?>"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container-fluid">
		<ul class="nav navbar-default justify-content-end">
		  <li class="nav-item">
				<?php if($this->session->has_userdata('type') ): ?>
			    <a href="<?=base_url($controller.'/logout')?>" type="button" class="btn btn-danger">Logout</a>
				<?php else:?>
		    	<a data-target="#modal_panel" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button" class="btn btn-primary">Login</a>
				<?php endif;?>
		  </li>
		</ul>
	</div>
	<div class="content-wrapper">
		<div class="container-fluid">
