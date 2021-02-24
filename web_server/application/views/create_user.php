<form class="form-horizontal" action="<?=base_url('landing/createUser')?>" method="POST">
	<div class="row">
		<div class="col">
			<fieldset>
				<!-- Form Name -->
				<legend>
					Basic Information
				</legend>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="first_name">First Name
					</label>
					<div class="col">
						<input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md" required="">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="middle_name">Middle Name
					</label>
					<div class="col">
						<input id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="form-control input-md">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="last_name">Last Name
					</label>
					<div class="col">
						<input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="suffix">Suffix
					</label>
					<div class="col">
						<input id="suffix" name="suffix" type="text" placeholder="Suffix" class="form-control input-md">
					</div>
				</div>
				<!-- Select Basic -->
				<div class="form-group">
					<label class="col control-label" for="Gender">gender
					</label>
					<div class="col">
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
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="date_of_birth">Date of Birth
					</label>
					<div class="col">
						<input id="date_of_birth" name="date_of_birth" type="date" placeholder="Date of Birth" class="form-control input-md">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="email_address">Email Address
					</label>
					<div class="col">
						<input id="email_address" name="email_address" type="email" placeholder="Email Address" class="form-control input-md">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="mobile_number">Mobile Number
					</label>
					<div class="col">
						<input id="mobile_number" name="mobile_number" type="text" placeholder="Mobile Number" class="form-control input-md">
					</div>
				</div>
			</fieldset>
		</div>
		<div class="col">
			<fieldset>
				<legend>
					Address
				</legend>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="country">Country
					</label>
					<div class="col">
						<input id="country" name="country" type="text" placeholder="Country" class="form-control input-md" required="">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="province">Province
					</label>
					<div class="col">
						<input id="province" name="province" type="text" placeholder="Province" class="form-control input-md">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="city_municipality">City/Municipality
					</label>
					<div class="col">
						<input id="city_municipality" name="city_municipality" type="text" placeholder="City/Municipality" class="form-control input-md">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="barangay">Barangay
					</label>
					<div class="col">
						<input id="barangay" name="barangay" type="text" placeholder="Barangay" class="form-control input-md">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="col control-label" for="zip_code">Zip Code
					</label>
					<div class="col">
						<input id="zip_code" name="zip_code" type="text" placeholder="Zip Code" class="form-control input-md">
					</div>
				</div>
			</fieldset>
		</div>
		<div class="col">
			<fieldset>
				<legend>
					Address
				</legend>
				<!-- File Button -->
				<div class="form-group">
					<label class="col control-label" for="face_image">Photo of Your Face</label>
					<div class="col">
						<input id="face_image" name="face_image" class="input-file" type="file" accept="image/*">
					</div>
				</div>
				<!-- File Button -->
				<div class="form-group">
					<label class="col control-label" for="id_image">Photo Of Your Valid ID</label>
					<div class="col">
						<input id="id_image" name="id_image" class="input-file" type="file" accept="image/*">
					</div>
				</div>
				<!-- File Button -->
				<div class="form-group">
					<label class="col control-label" for="face_id_image">Your Photo Holding Your Valid ID Beside Your Face</label>
					<div class="col">
						<input id="face_id_image" name="face_id_image" class="input-file" type="file" accept="image/*">
					</div>
				</div>
			</fieldset>
		</div>
		<div class="checkbox">
			<label for="terms">
				<input type="checkbox" id="terms" value="1" required>
				I Accept The ENGTECH QR <a href="#">Terms and Services</a>
			</label>
		</div>
		<input type="Submit" class="btn btn-success" value="SUBMIT">
	</div>
</form>
