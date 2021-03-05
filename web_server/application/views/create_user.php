<center>
	<div class="row d-none d-md-flex d-lg-flex" style="position:relative">
		<div class="col">
			<img class="img_basic_info" src="<?= base_url() ?>assets/image/basic-info.png" alt="" style="height:150px;padding:10px;">
		</div>
		<div class="col">
			<img class="img_upload_photo" src="<?= base_url() ?>assets/image/upload-photo.png" alt="" style="height:150px;padding:10px;">
		</div>
		<div class="col">
			<img class="img_verify" src="<?= base_url() ?>assets/image/upload-valid-id.png" alt="" style="height:150px;padding:10px;">
		</div>
		<div class="col">
			<img class="img_generate_qr" src="<?= base_url() ?>assets/image/generating-qr.png" alt="" style="height:150px;padding:10px;">
		</div>
	</div>
	<br>
	<div class="row d-md-none d-lg-none d-xs-block d-sm-block" style="position:relative">
		<div class="col">
			<img class="img_basic_info" src="<?= base_url() ?>assets/image/basic-info.png" alt="" style="height:70px;padding:10px;">
		</div>
		<div class="col">
			<img class="img_upload_photo" src="<?= base_url() ?>assets/image/upload-photo.png" alt="" style="height:70px;padding:10px;">
		</div>
		<div class="col">
			<img class="img_verify" src="<?= base_url() ?>assets/image/upload-valid-id.png" alt="" style="height:70px;padding:10px;">
		</div>
		<div class="col">
			<img class="img_generate_qr" src="<?= base_url() ?>assets/image/generating-qr.png" alt="" style="height:70px;padding:10px;">
		</div>
	</div>
</center>
<br>
<div class="card" style="border-radius:0px;">
  <div class="card-body" style="color:#7d7d7d;">
		<form class="form-horizontal" action="<?=base_url('landing/createUser')?>" method="POST">
			<fieldset>
				<div id="basic_info">
					<div class="row" style="color:#0a3663;">
						<div class="col">
							<h3>Basic Information</h3>
							<hr style="background-color: #0a3663;">
						</div>
					</div>
					<!-- Primay Information -->
						<legend style="font-weight:bold;">
							Primary Information
						</legend>
						<div class="row">
							<div class="col-md-4">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="first_name">First Name</label>
									<input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md" required="">
								</div>
							</div>
							<div class="col-md-4">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="middle_name">Middle Name</label>
									<input id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="form-control input-md">
								</div>
							</div>
							<div class="col-md-4">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="last_name">Last Name</label>
									<input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="suffix">Suffix</label>
									<input id="suffix" name="suffix" type="text" placeholder="Suffix" class="form-control input-md">
								</div>
							</div>
							<div class="col-md-2">
								<!-- Select Basic -->
								<div class="form-group">
									<label class="control-label" for="Gender">Gender</label>
									<select id="Gender" name="Gender" class="form-control">
										<option value="Male">Male
										</option>
										<option value="Female">Female
										</option>
										<option value="">Others
										</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="date_of_birth">Date of Birth</label>
									<input id="date_of_birth" name="date_of_birth" type="date" placeholder="Date of Birth" class="form-control input-md">
								</div>
							</div>
							<div class="col-md-2">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="mobile_number">Mobile Number</label>
									<input id="mobile_number" name="mobile_number" type="text" placeholder="Mobile Number" maxlength="11" class="form-control input-md">
								</div>
							</div>
							<div class="col-md-3">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="email_address">Email Address</label>
									<input id="email_address" name="email_address" type="email" placeholder="Email Address" class="form-control input-md email">
								</div>
							</div>
						</div>
					<!-- End Primay Information -->
					<!-- Address -->
					<legend style="font-weight:bold;">
						Address
					</legend>
					<div class="row">
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="country">Country</label>
								<input id="country" name="country" type="text" placeholder="Country" class="form-control input-md" required="">
							</div>
						</div>
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="province">Province</label>
									<input id="province" name="province" type="text" placeholder="Province" class="form-control input-md">
							</div>
						</div>
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="col control-label" for="city_municipality">City/Municipality</label>
									<input id="city_municipality" name="city_municipality" type="text" placeholder="City/Municipality" class="form-control input-md">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="zip_code">Zip Code</label>
								<input id="zip_code" name="zip_code" type="text" placeholder="Zip Code" class="form-control input-md">
							</div>
						</div>
						<div class="col-md-10">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="barangay">Barangay</label>
								<input id="barangay" name="barangay" type="text" placeholder="Barangay" class="form-control input-md">
							</div>
						</div>
					</div>
					<!-- End Address -->
					<div id="div_btn_next_basic" class="d-none">
						<div class="row">
							<div class="col">
								<a onclick="$('#attatchments').removeAttr('class'); $('#basic_info').attr('class','d-none');" class="btn btn-primary text-white float-right"
								style="
								background-color: #074886;
								width: 115px;
								border-top-left-radius: 30px 20px;
								border-bottom-left-radius: 30px 20px;
								border-top-right-radius: 30px 20px;
								border-bottom-right-radius: 30px 20px;
								">Next</a>
							</div>
						</div>
					</div>
				</div>
				<div id="attatchments" class="d-none">
					<div class="row" style="color:#0a3663;">
						<div class="col">
							<h3>Upload Attatchments</h3>
							<hr style="background-color: #0a3663;">
						</div>
					</div>
					<!-- File Attatchments -->
					<div class="row">
						<div class="col col-md-4 col-lg-4">
							<center>
								<div class="card" style="width: 18rem;margin:10px;">
								  <img id="img_face_image" class="card-img-top" src="<?= base_url() ?>assets/image/blank-image.png" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Photo of Your Face</h5>
										<a type="button" class="btn btn-outline-success text-success" onclick="$('#face_image').trigger('click');">Upload Photo</a>
			              <input id="face_image" name="face_image" class="input-file" type="file" accept="image/*" hidden>
								  </div>
								</div>
							</center>
						</div>
						<div class="col col-md-4 col-lg-4">
							<center>
								<div class="card" style="width: 18rem;margin:10px;">
								  <img id="img_id_image" class="card-img-top" src="<?= base_url() ?>assets/image/blank-image.png" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Photo Of Your Valid ID</h5>
										<a type="button" class="btn btn-outline-success text-success" onclick="$('#id_image').trigger('click');">Upload Valid ID</a>
										<input id="id_image" name="id_image" class="input-file" type="file" accept="image/*" hidden>
								  </div>
								</div>
							</center>
						</div>
						<div class="col col-md-4 col-lg-4">
							<center>
								<div class="card" style="width: 18rem;margin:10px;">
								  <img id="img_face_id_image" class="card-img-top" src="<?= base_url() ?>assets/image/blank-image.png" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title" style="font-size:15px; font-weight:bold;">Your Photo Holding Your Valid ID Beside Your Face</h5>
										<a type="button" class="btn btn-outline-success text-success" onclick="$('#face_id_image').trigger('click');">Upload Valid ID</a>
										<input id="face_id_image" name="face_id_image" class="input-file" type="file" accept="image/*"  hidden>
								  </div>
								</div>
							</center>
						</div>
						<div class="col">
								<div class="container">
									<div class="checkbox">
										<label for="terms">
											<input type="checkbox" id="terms" value="1" required>
											I Accept The ENGTECH QR <a href="#" data-toggle="modal" data-target="#termsModal">Terms and Conditions</a>
										</label>
									</div>
								</div>
						</div>
					</div>
					<!-- End File Attatchments -->
					<div id="div_btn_next_attatchments" class="d-none">
						<div class="row">
							<div class="col">
								<a id="attatchments_btn" onclick="$('#generate').removeAttr('class'); $('#attatchments').attr('class','d-none');" class="disabled btn btn-primary text-white float-right"
								style="
								background-color: #074886;
								width: 115px;
								border-top-left-radius: 30px 20px;
								border-bottom-left-radius: 30px 20px;
								border-top-right-radius: 30px 20px;
								border-bottom-right-radius: 30px 20px;
								">Next</a>
							</div>
						</div>
					</div>
				</div>
				<div id="generate" class="d-none">
					<div class="container">
						<div class="row" style="color:#0a3663;">
							<div class="col">
								<h3>Verification</h3>
								<hr style="background-color: #0a3663;">
							</div>
						</div>
						<div class="row">
							<center>
								<div class="col">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
										 ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
										 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in vo
										 luptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat no
										 n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									<br>
									<h6><b>Mobile Number:</b> <input type="text" name="otp_mobille_number" value="09112234542" style="border:0px;width:105px;" maxlength="11"><a type="button" class="btn"  style="color:#074886;"><i id="nav_btn_icon" class="fa fa-edit"></i> Edit</a> </h6>
									<p>you must something..................</p>
									<div id="div_btn_send_otp" class="float-center">
										<div class="row">
											<div class="col">
												<a id="btn_send_otp" onclick="alert('Success');" class="btn btn-primary btn-sm text-white"
												style="
												background-color: #074886;
												border-top-left-radius: 30px 20px;
												border-bottom-left-radius: 30px 20px;
												border-top-right-radius: 30px 20px;
												border-bottom-right-radius: 30px 20px;
												"><i id="nav_btn_icon" class="fa fa-paper-plane"></i> SEND OTP NOW</a>
											</div>
										</div>
										<div class="row">
											<div class="col-4 offset-4">
												<br>
												<input type="text" name="otp" value="" placeholder="One Time Password(SMS)" class="form-control text-center">
												<small>One Time Password via SMS</small>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<input type="Submit" class="btn btn-success float-center" value="SUBMIT">
											</div>
										</div>
									</div>
								</div>
							</center>
						</div>
					</div>
				</div>
			</fieldset>
			<!-- <div id="submit" class="d-none">
				<div class="row">
					<div class="col">
						<div class="container">
							<div class="checkbox">
								<label for="terms">
									<input type="checkbox" id="terms" value="1" required>
									I Accept The ENGTECH QR <a href="#">Terms and Services</a>
								</label>
							</div>
							<input type="Submit" class="btn btn-success float-right" value="SUBMIT">
						</div>
					</div>
				</div>
			</div> -->
		</form>
	</div>
</div>

<style media="screen">
	.nav_btn{
		position: fixed;
		width: 50px;
		height: 50px;
		bottom:0%;
		right: 0%;
		margin-right:30px;
		margin-bottom:70px;
		border-radius: 50%;
		padding-left: 2px;
		padding-right: 2px;
	}
	.tool_container{
		position: fixed;
		/* background-color: black; */
		right: 0%;
		bottom:0;
		margin-right:0%;
		margin-bottom:70px;
	}
	.tools{
		position: inherit;
		/* background-color: green; */
		height: 270px;
		padding:20px;
		right: 0%;
		bottom:0%;
		margin-right:10px;
		margin-bottom:80px;
		font-size: 25px;
		color:white;
	}
	.nav_btn_items{
		position: relative;
		width: 50px;
		height: 50px;
		padding-left:12px;
		padding-top:7px;
		border-radius: 50%;
		margin-right:0;
	}
</style>
<script type="text/javascript">
	function readURL(input,output) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#'+output).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}
	$("#face_id_image").change(function() {
		readURL(this,'img_face_id_image');
	});
	$("#id_image").change(function() {
		readURL(this,'img_id_image');
	});
	$("#face_image").change(function() {
		readURL(this,'img_face_image');
	});
</script>

<script type="text/javascript">
	$(document).on('change', 'input', function() {
		if ($('#first_name').val() && $('#middle_name').val() && $('#last_name').val() && $('#Gender').val()
			&& $('#date_of_birth').val() && $('#mobile_number').val() && $('#email_address').val()
			&& $('#country').val() && $('#province').val() && $('#city_municipality').val() && $('#zip_code').val() && $('#barangay').val() !="") {
			$('#div_btn_next_basic').removeAttr('class');
			$('.img_basic_info').attr("src", "<?= base_url() ?>assets/image/done-basic-info.png");
		}else{
			$('#div_btn_next_basic').attr('class','d-none');
		}

		if ($('#face_image').val() && $('#id_image').val() && $('#face_id_image').val() !="") {
				$('.img_upload_photo').attr("src", "<?= base_url() ?>assets/image/done-upload-photo.png");
				$('#div_btn_next_attatchments').removeAttr('class');
		}
		console.log($('#terms').prop("checked"));
		if ($('#terms').prop("checked")) {
			$('#attatchments_btn').attr('class', 'btn btn-primary text-white float-right');
		}else {
			$('#attatchments_btn').attr('class', 'disabled btn btn-primary text-white float-right');
		}
	});
</script>

<div class="modal fade" id="termsModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms And Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <center>
						<blockquote class="blockquote text-justify">
						<p class="mb-0">
							I hereby <b>authorize</b> ACLC College of Butuan, to collect and process the above information for the purpose of effecting control of the COVID-19 infection. I understand that my personal information is protected by RA 10173, Data Privacy Act of 2012 and that I am required by RA 11449, Bayanihan Heal as One Act, to provide <b>TRUTHFUL</b> information.
						</p>
						</blockquote
        </center>
        </div>
      </div>
    </div>
  </div>
</div>
