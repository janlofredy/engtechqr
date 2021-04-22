<!-- <?php
echo $qr;
echo '<center><pre>';
print_r( ($this->session->userdata()) );
echo '</pre></center>';
?> -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script> 

<div class="card">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#home">Establishment QR Code</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#menu1">Logs</a>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#menu2">Account Information</a>
		</li> -->
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane container active" id="home">
					<div id="qrcode">
					<div class="container">
						<center>
							<div class="row" style="color:#0a3663;">
								<div class="col">
									<h3>Congratulations!</h3>
									<hr style="background-color: #0a3663;">
								</div>
							</div>
						</center>
						<div class="row">
							<center>
								<div class="col col-md-6">
									<p style="text-align:center;">
										This is your Personal QR Code ID.
										Please make sure you keep a copy of your ACLC QR ID.
										<br>
										You may take a screenshot or save it as an image.
										<br>
										Check the saved image before proceeding, make sure the whole qr code is visible in the image saved.
										If not, try to reload the webpage and download the image again. or take a screenshot.
										<br>
										For you to review your QR Code ID please login using your registered e-mail address.
										<br>
										This is your unique and permanent QR Code (<b id="qrcode"><?php if ( $this->session->userdata('qr_info') != null  ) {
															echo $this->session->userdata('qr_info');
														}else {
															echo 'QR INFO NOT FOUND';
														}?></b>).
										Please keep it confidential and do not post it in publicity to avoid identity theft.
									</p>
								</div>
							</center>
						</div>
						<center>
							<div class="row">
								<div class="col col-md-6 offset-md-3">
									<div class="card">
										<img id="img_face_image" class="card-img-top" src="<?= base_url() ?>assets/image/home.png" alt="Card image cap" style="background-color:#343a40; padding:10px;">
										<div class="card-body">
												<div id="saveImageDIV">
													<div class="row">
														<div class="col">
															<?php if (isset($qr)) {
																echo $qr;
															}else {
																echo '<img src="'.base_url().'assets/image/logo.png" alt="">';
															}?>
															<h6><b>
															<?php if ( $this->session->userdata('qr_info') != null  ) {
																echo $this->session->userdata('qr_info');
															}else {
																echo 'QR INFO NOT FOUND';
															}?></b></h6>
														</div>
													</div>
													<hr>
													<div class="row">
														<div class="col">
															<!-- <pre> -->
															<?php if (isset($profile)) {
																// var_dump($profile);

																echo '<p>
																	<h5 style="color:#074886;"><b>'.$profile['establishment_name'].'</b></h5>
																	<label style="margin-bottom:0px;color:black;"><b>'.$profile['city_municipality'].'</b></label><br>
																	<small><b>City/Municipality</b></small>
																</p>';
															}else {
																echo '<img src="'.base_url().'assets/image/blank-image.png" alt="" width="100">';
															}?>
														<!-- </pre> -->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<a id="saveImage" class="btn btn-primary text-white"
														style="
														background-color: #074886;
														width: 200px;
														border-top-left-radius: 30px 16px;
														border-bottom-left-radius: 30px 16px;
														border-top-right-radius: 30px 16px;
														border-bottom-right-radius: 30px 16px;
														"  href="#"><i id="nav_btn_icon" class="fa fa-save"></i> Save Image</a>
													 <!--  <br>
														<br>
														<a id="imgSave" class="btn btn-primary text-white"
														style="
														background-color: #074886;
														width: 200px;
														border-top-left-radius: 30px 16px;
														border-bottom-left-radius: 30px 16px;
														border-top-right-radius: 30px 16px;
														border-bottom-right-radius: 30px 16px;
														"><i class="fas fa-cloud-download-alt"></i> Download PDF</a>
														<br>
														<br>
														<a onclick="" class="btn btn-primary text-white"
														style="
														background-color: #074886;
														width: 200px;
														border-top-left-radius: 30px 16px;
														border-bottom-left-radius: 30px 16px;
														border-top-right-radius: 30px 16px;
														border-bottom-right-radius: 30px 16px;
														"><i id="nav_btn_icon" class="fa fa-paper-plane"></i> Send ID to email</a> -->
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
						</center>
					</div>
					</div>
		</div>
		<div class="tab-pane container fade" id="menu1">
			<input type="date" name="startDate" id="startDate" value="<?= date('Y-m-d'); ?>">
			<input type="date" name="endDate" id="endDate" value="<?= date('Y-m-d'); ?>">
			<table id="logsTable" class="table table-striped">
			</table>
		</div>
		<div class="tab-pane container fade" id="menu2">
			
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function($) {
			
		var elem = document.getElementById('saveImageDIV');
		var getCanvas;
		// var logsTable;
		html2canvas(elem,{
			Logging: false, // log switch to view the internal execution process of html2canvas
			width:  elem.clientWidth , // DOM original width
			height: elem.clientHeight,
			scrollY: -window.scrollY, 
			scrollX: 0,
			Usecors: true 
		}).then((canvas) => {
			// var imagedata = canvas.toDataURL('image/png');
			// var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");

			var imagedata =  canvas.toDataURL("image/png"); 
						
			var imgdata = imagedata.replace(/^data:image\/png/, "data:application/octet-stream"); 
			$('#saveImage').attr("download", "QRCODE.png").attr("href", imgdata);
			$('#saveImage').trigger('click');
		})

		var logsTable = $('#logsTable').dataTable({
	        // "serverSide": true,
	        dom: 'Bflrtip',
	        "processing": true,
	        buttons: [
				'excel'
			],
	        ajax : { 
	        	'url' : '<?=base_url('establishment/getLogs')?>',
	        	'type' : 'POST',
	        	'data' : function( d ) { 
        			d.establishment_id = '<?=$profile["establishment_id"]?>';
		        	d.time_in =  $('#startDate').val();
		        	d.time_out = moment( $('#endDate').val() ).add(1,'days').format('yyyy-MM-D');
	        	}
	        },
			columns: [
				{ 'title': 'Name', 'data': 'name' },
				{ 'title': 'Date - Time In', 'data': 'time_in'  },
				{ 'title': 'Date - Time Out', 'data': 'time_out'  }
			],
		});

		$('#startDate').on('change', function(event) {
			event.preventDefault();
			start = $(this).val();
			$('#logsTable').DataTable().ajax.reload(null,false);
			// logsTable.ajax.reload(null,false);
			/* Act on the event */
		});
		$('#endDate').on('change', function(event) {
			event.preventDefault();
			end = $(this).val();
			$('#logsTable').DataTable().ajax.reload(null,false);
			// logsTable.ajax.reload(null,false);
			/* Act on the event */
		});



	});

	// console.log(elem)
</script>