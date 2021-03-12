<!DOCTYPE html5>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url();?>/assets/style.css">
	<link rel="stylesheet" href="<?=base_url();?>plugins/bootstrap4/css/bootstrap.min.css">
	<title>QR COde</title>
</head>
<body style="width:100%;">
	<center>
	<div class="container-fluid">
		<div class="row">
			<div class="col" style="margin-top:25px">
				<img src="<?=base_url();?>/assets/image/home.png" class="img-fluid">
			</div> 
		</div>
		<div class="row">
			<legend style="color:white;">
				Individual
			</legend>
			<div class="col" style="margin-top:40px">
				<a href="<?=base_url('landing/create_user')?>">
					<img src="<?=base_url();?>/assets/image/register.png" class="img-fluid">
					<h3>REGISTER</h3>
				</a>
			</div>
			<div class="col" style="margin-top:40px">
				<a href="<?=base_url('landing/login_user')?>">
					<img src="<?=base_url();?>/assets/image/register.png" class="img-fluid">
					<h3>Login</h3>
				</a>
			</div>
		</div>
		<div class="row">
			<legend style="color:white;">
				Establishment
			</legend>
			<!-- <div class="col" style="margin-top:40px">
				<a href="<?=base_url('landing/create_establishment')?>">
					<img src="<?=base_url();?>/assets/image/register.png" class="img-fluid">
					<h3>REGISTER</h3>
				</a>
			</div>
			<div class="col" style="margin-top:40px">
				<a href="<?=base_url('landing/login_establishment')?>">
					<img src="<?=base_url();?>/assets/image/register.png" class="img-fluid">
					<h3>Login</h3>
				</a>
			</div> -->
			<div class="col" style="margin-top:40px">
				<a href="<?=base_url('web_scanner/')?>">
					<img src="<?=base_url();?>/assets/image/register.png" class="img-fluid">
					<h3>Scanner</h3>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col" style="margin-top:40px">
				<img src="<?=base_url();?>/assets/image/aclc.png" class="img-fluid">
			</div>
		</div>
	</div>
	</center>
</body>
</html>