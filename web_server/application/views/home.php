<!DOCTYPE html5>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url();?>/assets/style.css">
	<link rel="stylesheet" href="<?=base_url();?>plugins/bootstrap4/css/bootstrap.min.css">
	<title>QR CODE</title>
	<style type="text/css">
		h3 {
			color: white;
		}
		a:hover {
			text-decoration: none;
		}
		#btns {
			background-image: url("<?=base_url();?>/assets/image/btnbg.png");
			background-repeat: no-repeat;
			background-size: 100%;
			background-position: center;
		}
		hr {
			transform:rotate(90deg);
			-ms-transform:rotate(90deg);
			/* IE 9 */
			-webkit-transform:rotate(90deg);
			/* Safari and Chrome */
		}

	</style>
</head>
<body>
	<center>
	<div class="container-fluid">
		<div class="row">
			<div class="col my-5">
				<img src="<?=base_url();?>/assets/image/home.png" class="img-fluid">
			</div> 
		</div>
		<div class="row">
			<!-- <legend style="color:white;">
				Individual
			</legend> -->
			<div class="col ">
				<a href="<?=base_url('web_scanner/')?>">
					<img src="<?=base_url();?>/assets/image/qr.png" class="img-fluid">
					<h3>Click QR Code to Scan</h3>
				</a>
			</div>
		</div>
		<div class="container">
			<div class="row my-5 py-5" id="btns">
				<!-- <legend style="color:white;">
					Establishment
				</legend> -->
				<div class="col" >
					<a href="<?=base_url('landing/create_user')?>">
						<img src="<?=base_url();?>/assets/image/userReg.png" class="img-fluid">
						<h3>Personal User<br>Registration</h3>
					</a>
				</div>
				<div class="col">
					<a href="<?=base_url('landing/login_user')?>">
						<img src="<?=base_url();?>/assets/image/userLogin.png" class="img-fluid">
						<h3>Personal<br>User Log-in</h3>
					</a>
				</div>
				<div class="col" >
					<a href="<?=base_url('landing/create_establishment')?>">
						<img src="<?=base_url();?>/assets/image/estReg.png" class="img-fluid">
						<h3>Establishment<br>Registration</h3>
					</a>
				</div>

				<div class="col" >
					<a href="<?=base_url('landing/login_establishment')?>">
						<img src="<?=base_url();?>/assets/image/estLogin.png" class="img-fluid">
						<h3>Establishment<br>Log-in</h3>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col" style="margin-top:40px">
				<a href="http://aclcbutuan.edu.ph/">
					<img src="<?=base_url();?>/assets/image/aclc.png" class="img-fluid">
				</a>
			</div>
		</div>
	</div>
	</center>
</body>
</html>