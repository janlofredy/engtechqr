<br>
<br>
<br>
<div class="row">
	<div class="col col-md-4 offset-md-4 col-lg-4 offset-lg-4">
		<div class="card" style="border-radius: 0;">
			<div class="card-body">
				<form id="userLogin" method="POST" class="form-horizontal">
					<div class="row">
						<div class="col">
							<div class="container">
								<div class="card" style="margin:10px; color: #343a40; font-weight: bold;">
									<div class="card-body">
										<h5 class="card-title">Individual login using your registered e-mail address</h5>
										<div class="form-group">
											<label class="control-label" for="email_add">Email Address:</label>
											<input type="email" name="email_address" id="email_add" class="form-control" required>
										</div>
										<div id="notice">
											
										</div>
										<div class="form-group float-right">
											<input id="loginBtn" type="submit" class="btn btn-primary btn-sm">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<form id="verifyOTP" method="POST" class="form-horizontal d-none" action="<?=base_url('landing/verifyOTP')?> ">
					<div class="row">
						<div class="col">
							<center>
								<div class="col">
									<fieldset>
										<legend>
											OTP Verification
										</legend>
										<input type="hidden" name="user_id" id="user_id">
										<input type="hidden" name="email_addr" id="email_addr">
										<input type="hidden" name="phone_num" id="phone_num">
										<div class="form-group">
											<input type="pin" name="otp" id="otp" class="form-control text-center col-md-4" placeholder="OTP CODE">
										</div>
										<div class="form-group">
											<input id="verifyBtn" type="submit" class="btn btn-success btn-sm">
										</div>
										Did not receive email? <a id="sendByEmail" href="#">Resend OTP to Email</a>
										<br>
										<!-- <a id="sendByMobile" href="#">Send OTP to Mobile Number</a> -->
									</fieldset>
								</div>
							</center>
						</div>
					</div>
				</form>	
			</div>
		</div>	
	</div>
</div>
<script type="text/javascript">

	$('#sendByMobile').on('click', function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?=base_url('landing/resendOTPToMobile')?>',
			type: 'POST',
			dataType: 'json',
			data: {mobile_number: $('#phone_num').val()},
		})
		.done(function() {
			// console.log("success");
			if (data.result == "Email Not Found"){
				$('#notice').html("Email Address Not Found. <a href='<?=base_url('landing/create_user');?>''>Create Account Here</a>" )
			}else if(data.result == "Failed to Send to Email"){
				$('#notice').html("Failed To Send Email.")
			}else{
				// $('#notice').html("Please Check your Email for your OTP." );
				$('#user_id').val(data.user_id);
				$('#email_addr').val(data.email_address);
				$('#phone_num').val(data.mobile_number);
				$('#verifyOTP').validate().showErrors({'otp':"Please Check your Mobile for your OTP."});
				$('#userLogin').addClass('d-none');
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		/* Act on the event */
	});

	$('#sendByEmail').on('click', function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?=base_url('landing/loginUser')?>',
			type: 'POST',
			dataType: 'json',
			data: {email_address: $('#email_addr').val()},
		})
		.done(function(data) {
			if (data.result == "Email Not Found"){
				$('#notice').html("Email Address Not Found. <a href='<?=base_url('landing/create_user');?>''>Create Account Here</a>" )
			}else if(data.result == "Failed to Send to Email"){
				$('#notice').html("Failed To Send Email.")
			}else{
				// $('#notice').html("Please Check your Email for your OTP." );
				$('#verifyOTP').removeClass('d-none');
				$('#user_id').val(data.user_id);
				$('#email_addr').val(data.email_address);
				$('#phone_num').val(data.mobile_number);
				$('#verifyOTP').validate().showErrors({'otp':"Please Check your Email for your OTP."});
				$('#userLogin').addClass('d-none');
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		/* Act on the event */
	});

	$('#userLogin').on('submit', function(event) {
		$('#loginBtn').prop('disabled',true);
		event.preventDefault();
		$.ajax({
			url: '<?=base_url('landing/loginUser')?>',
			type: 'POST',
			dataType: 'json',
			data: {email_address: $('#email_add').val()},
		})
		.done(data => {
			if (data.result == "Email Not Found"){
				$('#notice').html("Email Address Not Found. <a href='<?=base_url('landing/create_user');?>''>Create Account Here</a>" )
			}else if(data.result == "Failed to Send to Email"){
				$('#notice').html("Failed To Send Email.")
			}else{
				// $('#notice').html( "Please Check your Email for your OTP." );
				$('#verifyOTP').removeClass('d-none');
				$('#user_id').val(data.user_id);
				$('#email_addr').val(data.email_address);
				$('#phone_num').val(data.mobile_number);
				$('#verifyOTP').validate().showErrors({'otp':"Please Check your Email for your OTP."});
				$('#userLogin').addClass('d-none');
			}
			$('#loginBtn').removeAttr('disabled');
		})
	});

	$('#verifyOTP').on('submit', function(event) {
		event.preventDefault();
		$('#verifyBtn').prop('disabled',true);
		$.ajax({
			url: '<?=base_url('landing/verifyOTP')?>',
			type: 'POST',
			dataType: 'json',
			data: {otp: $('#otp').val(), user_id: $('#user_id').val()},
		})
		.done(data => {
			if(data.result=="success"){
				location.reload();
			}else{
				// $('#verifyOTP').validate().showErrors({'otp':data.result});
				// $('#notice').html( data.result )
			}
			$('#verifyOTP').validate().showErrors({'otp':data.result});
			$('#verifyBtn').removeAttr('disabled');
			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		/* Act on the event */
	});

</script>