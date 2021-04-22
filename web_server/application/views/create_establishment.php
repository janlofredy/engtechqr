<style type="text/css">
	.error{
		color:red;
	}
</style>
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
	</div>
</center>
<br>
<div class="card" style="border-radius:0px;">
	<div class="card-body" style="color:#7d7d7d;">
		<!-- <form class="form-horizontal" action="<?=base_url('landing/createEstablishment')?>" method="POST"> -->
		<form class="form-horizontal" action="#" method="POST" id="createEstablishmentForm" enctype="multipart/form-data">
			<fieldset>
				<div id="basic_info">
					<div class="row" style="color:#0a3663;">
						<div class="col">
							<h3>Establishment Registration</h3>
							<hr style="background-color: #0a3663;">
						</div>
					</div>
					<!-- Primary Information -->
						<legend style="font-weight:bold;">
							Establishment Information
						</legend>
						<div class="row">
							<div class="col-md-4">
								<!-- Text input-->
								<div class="form-group">
									<label class="control-label" for="establishment_name">Establishment Name*</label>
									<input id="establishment_name" name="establishment_name" type="text" placeholder="Establishment Name" class="form-control input-md" required>
								</div>
							</div>
							<div class="col-md-2">
								<!-- Select Basic -->
								<div class="form-group">
									<label class="control-label" for="establishment_type">Establishment Type*</label>
									<select id="establishment_type" name="establishment_type" class="form-control" required>
										<option value="" disabled selected>Establishment Type</option>
										<option value="Agriculture">Agriculture</option>
										<option value="Bank">Bank</option>
										<option value="Barangay Hall">Barangay Hall</option>
										<option value="Church">Church</option>
										<option value="Checkpoint">Checkpoint</option>
										<option value="City Hall">City Hall</option>
										<option value="City Health Office">City Health Office</option>
										<option value="Clinic">Clinic</option>
										<option value="Conveniunce Store">Conveniunce Store</option>
										<option value="Department Store">Department Store</option>
										<option value="Hardware">Hardware</option>
										<option value="Hospital">Hospital</option>
										<option value="Hotel">Hotel</option>
										<option value="Insurance">Insurance</option>
										<option value="Laboratory">Laboratory</option>
										<option value="Mall">Mall</option>
										<option value="Market">Market</option>
										<option value="Pharmacy/Drugstore">Pharmacy/Drugstore</option>
										<option value="Police Station">Police Station</option>
										<option value="Public Vehicle">Public Vehicle</option>
										<option value="Restaurant">Restaurant</option>
										<option value="Remittace Center">Remittace Center</option>
										<option value="School">School</option>
										<option value="Store">Store</option>
										<option value="Super Market">Super Market</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</div>
						</div>
					<!-- End Primary Information -->
					<!-- Address -->
					<legend style="font-weight:bold;">
						Address
					</legend>
					<div class="row">
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="country">Country*</label>
								<input id="country" name="country" type="text" placeholder="Country" class="form-control input-md" required="" required>
							</div>
						</div>
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="province">Province*</label>
									<input id="province" name="province" type="text" placeholder="Province" class="form-control input-md" required>
							</div>
						</div>
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="col control-label" for="city_municipality">City/Municipality*</label>
									<input id="city_municipality" name="city_municipality" type="text" placeholder="City/Municipality" class="form-control input-md" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="zip_code">Zip Code*</label>
								<input id="zip_code" name="zip_code" type="text" placeholder="Zip Code" class="form-control input-md" required>
							</div>
						</div>
						<div class="col-md-10">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="barangay">Barangay*</label>
								<input id="barangay" name="barangay" type="text" placeholder="Barangay" class="form-control input-md" required>
							</div>
						</div>
					</div>
					<!-- End Address -->
					<div id="div_btn_next_basic">
						<div class="row">
							<div class="col">
								<a id="btn_next_basic" class="btn btn-primary text-white float-right"
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
							<h3>Contact Person Information</h3>
							<hr style="background-color: #0a3663;">
						</div>
					</div>
					<legend style="font-weight:bold;">
						Contact Person
					</legend>
					<div class="row">
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="contact_first_name">First Name*</label>
								<input id="contact_first_name" name="contact_first_name" type="text" placeholder="First" class="form-control input-md" required="" required>
							</div>
						</div>
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="contact_middle_name">Middle Name*</label>
									<input id="contact_middle_name" name="contact_middle_name" type="text" placeholder="Middle Name" class="form-control input-md" required>
							</div>
						</div>
						<div class="col-md-4">
							<!-- Text input-->
							<div class="form-group">
								<label class="col control-label" for="contact_last_name">Last Name*</label>
									<input id="contact_last_name" name="contact_last_name" type="text" placeholder="Last Name" class="form-control input-md" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="contact_mobile_number">Mobile Number*</label>
								<input id="contact_mobile_number" name="contact_mobile_number" type="text" placeholder="Mobile Number" class="form-control input-md" required>
							</div
>						</div>
						<div class="col-md-10">
							<!-- Text input-->
							<div class="form-group">
								<label class="control-label" for="contact_email">Email Address*</label>
								<input id="contact_email" name="contact_email" onchange="$('input[name=otp_email]').val($(this).val());" type="email" placeholder="Email Address" class="form-control input-md" required>
							</div>
						</div>
					</div>
					<!-- End File Attatchments -->
					<div id="div_btn_next_attatchments">
						<div class="row">
							<div class="col">
								<p id="attachment_notice" class="text-right"></p>
							</div>
							<div class="col">
								<a id="attachment_btn" class="btn btn-primary text-white float-right"
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
			</fieldset>
		</form>

		<div id="activation" class="d-none">
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
							<div class="row">
								<div class="col col-md-6 offset-md-3">
										<p>A 6-digit One-Time Pin (OTP) has been sent via Email for Verification to your Email Address below.</p>
								</div>
							</div>
							<div class="row">
								<div class="col col-md-4 offset-md-4">
									<input type="hidden" name="user_id" id="user_idVerify">
									<h6><b>Email Address</b></h6>
									<div class="input-group">
										<input class="form-control" type="text" name="otp_email" id="otp_email" disabled>
									</div>
								</div>
							</div>
							<form id="otpVerifyForm">
							<div class="row">
								<div class="col">
									<br>
									<p>Did not receive OTP? Click this button to resend OTP</p>
									<a id="btn_send_otp" class="btn btn-primary btn-sm text-white"
									style="
									background-color: #074886;
									border-top-left-radius: 30px 20px;
									border-bottom-left-radius: 30px 20px;
									border-top-right-radius: 30px 20px;
									border-bottom-right-radius: 30px 20px;
									"><i id="nav_btn_icon" class="fa fa-paper-plane"></i> RESEND OTP NOW</a>
								</div>
							</div>
							<div id="div_btn_send_otp" class="float-center">
								<div class="row">
									<div class="col col-md-4 offset-md-4">
										<div class="container">
											<br>
											<input type="text" id="otpVerify" name="otp" placeholder="One Time Pin(Email)" class="form-control text-center">
											<small>One Time Pin via Email</small>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<!-- <input type="Submit" class="btn btn-success float-center" value="SUBMIT"> -->
										<input type="button" class="btn btn-success float-center" value="Verify OTP" id="verifyOTPbtn">
									</div>
								</div>
							</div>
						</form>
						</div>
					</center>
				</div>
			</div>
		</div>
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
	// $.validator.addMethod("roles", function(value, elem, param) {
	//    return $(".roles:checkbox:checked").length > 0;
	// },"You must select at least one!");
	$.validator.setDefaults({ 
		ignore: [],
		// any other default options and/or rules
		});
	$('#btn_next_basic').on('click', function(){
		if($('#createEstablishmentForm').validate().element('#establishment_name') && $('#createEstablishmentForm').validate().element('#establishment_type') && $('#createEstablishmentForm').validate().element('#country') && $('#createEstablishmentForm').validate().element('#province') && $('#createEstablishmentForm').validate().element('#city_municipality') && $('#createEstablishmentForm').validate().element('#zip_code') && $('#createEstablishmentForm').validate().element('#barangay')){
			$('#attatchments').removeAttr('class');
			$('#basic_info').attr('class','d-none');
			$('.img_basic_info').attr("src", "<?= base_url() ?>assets/image/done-basic-info.png");
		}
	});

	$('#attachment_btn').on('click', function(){
		$('#attachment_btn').prop('disabled',true);
		if( $('#createEstablishmentForm').validate().element('#contact_first_name') && $('#createEstablishmentForm').validate().element('#contact_middle_name') && $('#createEstablishmentForm').validate().element('#contact_last_name') && $('#createEstablishmentForm').validate().element('#contact_mobile_number') && $('#createEstablishmentForm').validate().element('#contact_email') ){
			$('#attachment_notice').html('Loading...');
			$.ajax({
				url: '<?=base_url('landing/createEstablishment')?>',
				type: 'POST',
				dataType: 'json',
				data: new FormData(document.getElementById('createEstablishmentForm') ),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
			})
			.done(function(dataRes) {
				if(dataRes.result){
					$('#activation').removeAttr('class');
					$('#attatchments').attr('class','d-none');
					$('.img_upload_photo').attr("src", "<?= base_url() ?>assets/image/done-upload-photo.png");
					$('#user_idVerify').val(dataRes.data.user_id);
					$('#attachment_btn').removeAttr('disabled');
				}else{
					$('#attachment_notice').html(dataRes.message);
					$('#attachment_btn').removeAttr('disabled');
					// alert(dataRes.message);
				}
			})
		}
	});
	$('#verifyOTPbtn').on('click',function(e){
		e.preventDefault();
		$('#verifyOTPbtn').prop('disabled',true);
		$.ajax({
			url: '<?=base_url("landing/verifyOTPEst")?>',
			type: 'POST',
			dataType: 'json',
			data: {user_id: $('#user_idVerify').val(),otp: $('#otpVerify').val()},
		})
		.done(function(data) {
			console.log(data.result);
			if(data.result == "success"){
				location.reload();
			}else{
				$('#otpVerifyForm').validate().showErrors({'otp':data.result})
				$('#verifyOTPbtn').removeAttr('disabled');
			}
		})
		$('#verifyOTPbtn').removeAttr('disabled');
	})
	$('#contact_email').on('change',function(){
		if($('#createEstablishmentForm').validate().element('#contact_email')){
			$.ajax({
				url: '<?=base_url('landing/verifyDuplicateEst')?>',
				type: 'POST',
				dataType: 'json',
				data: {contact_email: $(this).val()},
			})
			.done(function(data) {
				if(data.result){
					$('#createEstablishmentForm').validate().showErrors({
					  "contact_email": "This Email Address is already in use, Please use a different Email Address. or you can login using your email address."
					});
					$('#btn_next_basic').addClass('disabled')
				}else{
					$('#btn_next_basic').removeClass('disabled')
				}
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	})
	$('#btn_send_otp').on('click',function(){
		$('#btn_send_otp').prop('disabled',true);
		$.ajax({
			url: '<?=base_url('landing/resendOTPToEmailEst')?>',
			type: 'POST',
			dataType: 'json',
			data: {email_address: $('#contact_email').val()},
		})
		.done(function() {
			$('#btn_send_otp').removeAttr('disabled');
			// console.log("success");
		})
		
	})
	$('#otpVerifyForm').on('submit',function(event){
		event.preventDefault();
	})
	// $(document).on('change', 'input', function() {
	// 	if ($('#first_name').val() && $('#last_name').val() && $('#gender').val()
	// 		&& $('#date_of_birth').val() && $('#mobile_number').val() && $('#email_address').val()
	// 		&& $('#country').val() && $('#province').val() && $('#city_municipality').val() && $('#zip_code').val() && $('#barangay').val() !="") {
	// 		$('#div_btn_next_basic').removeAttr('class');
	// 		$('.img_basic_info').attr("src", "<?= base_url() ?>assets/image/done-basic-info.png");
	// 	}else{
	// 		$('#div_btn_next_basic').attr('class','d-none');
	// 	}

	// 	if ($('#face_image').val() && $('#id_image').val() && $('#face_id_image').val() !="") {
	// 			$('.img_upload_photo').attr("src", "<?= base_url() ?>assets/image/done-upload-photo.png");
	// 			$('#div_btn_next_attatchments').removeAttr('class');
	// 	}
	// 	console.log($('#terms').prop("checked"));
	// 	if ($('#terms').prop("checked")) {
	// 		$('#attachment_btn').attr('class', 'btn btn-primary text-white float-right');
	// 	}else {
	// 		$('#attachment_btn').attr('class', 'disabled btn btn-primary text-white float-right');
	// 	}
	// });
	// Add Function Change color of Verification and Generating QR Code

</script>

<div class="modal fade" id="termsModal" style="margin-top:300px;">
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
						</blockquote>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
