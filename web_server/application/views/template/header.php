<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= defined('HEADER_TITLE') ? HEADER_TITLE : "EngTech QR" ?></title>
	<link rel="shortcut icon" href="<?= base_url()?>assets/image/logo.png" type="image/png" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="<?=base_url('plugins/bootstrap4/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/style.css')?>">
	<script type="text/javascript"></script>
</head>
<body>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<div class="col">
			<a class="navbar-brand" href="<?=base_url();?>">
				<img src="<?= base_url() ?>assets/image/aclc-right.png" style="height:30px;">
			</a>
			<a class="navbar-brand" href="<?=base_url();?>">
				<img src="<?= base_url() ?>assets/image/home.png" style="height:30px;">
			</a>
		</div>
	  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button> -->
		<div class="col">
			<div class="collapse navbar-collapse pull-right collapse show" id="navbarText">
		    <ul class="navbar-nav mr-auto"></ul>
		    <a href="<?=base_url($controller.'/logout')?>" type="button" class="btn btn-danger">Logout</a>
		    <span class="navbar-text" style="color:white;font-size:10px;">
		      Powered by: <a href="http://engtechglobalsolutions.com/" target='_blank' style="font-weight:bold;">ENGTECH GLOBAL SOLUTIONS INC.</a>
		    </span>
		  </div>
		</div>

	</nav>
	<div class="content-wrapper" style="margin-top:100px;margin-bottom:100px;">

		<!-- <div class="container-fluid">
			<ul class="nav navbar-default justify-content-end">
			  <li class="nav-item">
					<?php if($this->session->has_userdata('type') ): ?>
				    <a href="<?=base_url($controller.'/logout')?>" type="button" class="btn btn-danger">Logout</a>
					<?php else:?>
			    	<a data-target="#modal_panel" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button" class="btn btn-primary">Login</a>
					<?php endif;?>
			  </li>
			</ul>
		</div> -->
		<div class="container">
