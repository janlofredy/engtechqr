
<script type="text/javascript" src="<?=base_url('plugins/qr-scanner/html5-qrcode.js')?>"></script>




<div class="row">
	<div  class="col col-md-4 col-lg-4">
		<center>
			<h1 id="estName" class="text-center" style="color:black;background-color: white;"></h1>
		</center>
		<div id="set_establishment_qr_div">
			<center>
				<div class="card" style="margin:10px;">
					<!-- <img id="img_id_image" class="card-img-top" src="<?= base_url() ?>assets/image/blank-image.png" alt="Card image cap"> -->
					<div class="card-body">
						<h5 class="card-title">Set Establishment</h5>
						<a type="button" class="btn btn-outline-success text-success" onclick="$('#set_establishment_qr').trigger('click');">Scan Establishment QR Code</a>
						<input id="set_establishment_qr" name="set_establishment_qr" class="input-file" type="file" accept="image/*" hidden capture >
					</div>
				</div>
			</center>
			<div id="reader"></div>
		</div>
		<div>
			<center>
				<div class="card" style="margin:10px;">
					<img id="img_id_image" class="card-img-top" src="<?= base_url() ?>assets/image/blank-image.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Scan New Guest</h5>
						<a type="button" class="btn btn-outline-success text-success" onclick="$('#newGuest').trigger('click');">Scan Guest QR Code</a>
						<input id="newGuest" name="newGuest" class="input-file" type="file" accept="image/*" hidden capture >
					</div>
				</div>
			</center>
			<div id="reader2"></div>
		</div>
	</div>

	<div class="col col-md-8 col-lg-8" style="background-color:white;">
		<div class="row">
			<h1 id="guestStatus"></h1>
		</div>
		<div class="row">
			<div class="col">
				<div class="card">
					<img id="profileImage" src="<?= base_url() ?>assets/image/blank-image.png">
				</div>
			</div>
			<div class="col">
				<legend class="text-success">
					Basic Information
				</legend>
				<h5 class="text text-justify">Name			:	<b id="guestName"></b> </h5>
				<h5 class="text text-justify">Date of Birth	:	<b id="dob"></b> </h5>
				<h5 class="text text-justify">Contact Number	:	<b id="contactN"></b> </h5>
				<h5 class="text text-justify">Email Address	:	<b id="email"></b> </h5>
				<!-- <legend></legend>
				<h5>Name			:	<b id="guestName"></b> </h5>
				<h5>Name			:	<b id="guestName"></b> </h5>
				<h5>Name			:	<b id="guestName"></b> </h5>
				<h5>Name			:	<b id="guestName"></b> </h5> -->
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

	var establishmentQR;
	var individualQR;

	function readURL(input,output) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#'+output).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}

	html5QrCode = new Html5Qrcode("reader");
	estFileInput = document.getElementById('set_establishment_qr');

	estFileInput.addEventListener('change', e => {

		if (e.target.files.length == 0) {
			// No file selected, ignore 
			return;
		}

		imageFile = e.target.files[0];
		// Scan QR Code
		html5QrCode.scanFile(imageFile, false)
		.then(qrCodeMessage => {
			// success, use qrCodeMessage
			// alert(qrCodeMessage);
			$.ajax({
				url: '<?=base_url('web_api/getEstablishment')?>',
				type: 'POST',
				dataType: 'json',
				data: {qrInfo: qrCodeMessage},
			})
			.done(data => {
				if(data){
					$('#estName').html(data.establishment_name)
					$('#set_establishment_qr_div').addClass('d-none');
					establishmentQR = data.qr_info;
				}
				console.log(data);
			})
			

		})
		.catch(err => {
			// failure, handle it.
			alert(`Error scanning file. Reason: ${err}`)
		});
	});


	guestFileInp = document.getElementById('newGuest');

	guestFileInp.addEventListener('change', geg => {
		readURL(geg.target,'img_id_image');
		if (geg.target.files.length == 0) {
			// No file selected, ignore 
			return;
		}

		imageFile2 = geg.target.files[0];
		// Scan QR Code
		html5QrCode.scanFile(imageFile2, false)
		.then(qrMess => {
			// success, use qrMess
			// alert(qrMess);
			$.ajax({
				url: '<?=base_url('web_api/getIndividual')?>',
				type: 'POST',
				dataType: 'json',
				data: {qrInfo: qrMess},
			})
			.done(async data => {
				console.log(data);
				loadGuestInfo(data);
				individualQR = data.qr_info;
				$.ajax({
					url: '<?=base_url('web_api/qrLog')?>',
					type: 'POST',
					dataType: 'json',
					data: {qrInfoEst:establishmentQR, qrInfoInd: individualQR},
				})
				.done(async function(data2) {
					console.log(data2)
					individualQR=null;
				})
			})
		})
		.catch(err => {
			// failure, handle it.
			console.log(`Error scanning file. Reason: ${err}`)
		});
	});

	function loadGuestInfo(guestInfo){
		$('#profileImage')
			.attr('src', 
				'<?=base_url();?>'+guestInfo.face_image
			);
		$('#guestName')
			.html(
				guestInfo.first_name + ' ' + guestInfo.middle_name + " " + guestInfo.last_name
			);
		$('#dob')
			.html(
				formatDate(guestInfo.date_of_birth)
			);
		$('#contactN')
			.html(
				guestInfo.mobile_number
			);
		$('#email')
			.html(
				guestInfo.email_address
			);
		setTimeout(function(){
			$('#profileImage').attr('src','<?= base_url() ?>assets/image/blank-image.png');
			$('#guestName').html('');
			$('#dob').html('');
			$('#contactN').html('');
			$('#email').html('');
		},5000);
	}

	function formatDate(dated){
		const months = ["January", "Febeuary", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
		let current_datetime = new Date(dated)
		let formatted_date = months[current_datetime.getMonth()] + ' ' + current_datetime.getDate() + ", "  + current_datetime.getFullYear()
		return (formatted_date)
	}
</script>