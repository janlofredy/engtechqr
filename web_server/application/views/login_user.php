<form id="userLogin" method="POST" class="form-horizontal">

	<div class="row">
		<div class="col">
			<fieldset>
				<legend>
					Basic Information
				</legend>
				<div class="form-group">
					<label class="control-label" for="email_add">Email Address:</label>
					<input type="email" name="email_address" id="email_add" required>
				</div>
				<div id="notice">
					
				</div>
				<div class="form-group">
					<input type="submit">
				</div>
			</fieldset>
		</div>
	</div>
</form>
<form id="verifyOTP" method="POST" class="form-horizontal" action="<?=base_url('landing/verifyOTP')?> ">

	<div class="row">
		<div class="col">
			<fieldset>
				<legend>
					OTP Verification
				</legend>
				<input type="hidden" name="user_id" id="user_id">
				<input type="hidden" name="email_addr" id="email_addr">
				<input type="hidden" name="phone_num" id="phone_num">
				<div class="form-group">
					<label class="control-label" for="otp">OTP</label>
					<input type="pin" name="otp" id="otp">
				</div>
				<a id="sendByEmail" href="#">Send OTP to Email</a>
				<a id="sendByMobile" href="#">Send OTP to Mobile Number</a>
				<div class="form-group">
					<input type="submit">
				</div>
			</fieldset>
		</div>
	</div>
</form>


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
			console.log("success");
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
		.done(function() {
			if (data.result == "Email Not Found"){
				$('#notice').html("Email Address Not Found. <a href='<?=base_url('landing/create_user');?>''>Create Account Here</a>" )
			}else if(data.result == "Failed to Send to Email"){
				$('#notice').html("Failed To Send Email.")
			}else{
				$('#notice').html( "Please Check your Email for your OTP." );
				$('#user_id').val(data.user_id);
				$('#email_addr').val(data.email_address);
				$('#phone_num').val(data.mobile_number);
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
				$('#notice').html( "Please Check your Email for your OTP." );
				$('#user_id').val(data.user_id);
				$('#email_addr').val(data.email_address);
				$('#phone_num').val(data.mobile_number);
			}
		})
	});

	$('#verifyOTP').on('submit', function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?=base_url('landing/verifyOTP')?>',
			type: 'POST',
			dataType: 'json',
			data: {otp: $('#otp').val(), user_id: $('#user_id').val()},
		})
		.done(data => {
			if(data.result=="Success"){
				location.reload();
			}else{
				$('#notice').html( data.result )
			}
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