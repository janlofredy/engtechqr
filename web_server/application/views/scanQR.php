
<label for="set_establishment_qr">Set Establishment</label>
<input type="file" id="set_establishment_qr" accept="image/*" capture>

<!-- <input type="file" id="New Guest" accept="image/*" capture> -->

<div id="reader" ></div>

<script type="text/javascript">
const html5QrCode = new Html5Qrcode("reader");
// File based scanning
const fileinput = document.getElementById('set_establishment_qr');

fileinput.addEventListener('change', e => {
  if (e.target.files.length == 0) {
    // No file selected, ignore 
    return;
  }

  const imageFile = e.target.files[0];
  // Scan QR Code
  html5QrCode.scanFile(imageFile, true)
  .then(qrCodeMessage => {
    // success, use qrCodeMessage
    alert(qrCodeMessage);
    $.ajax({
    	url: '<?=base_url('web_api/getEstablishment')?>',
    	type: 'POST',
    	dataType: 'json',
    	data: {qrInfo: qrCodeMessage},
    })
    .done(data => {
    	console.log(data);
    })
    .fail(function() {
    	console.log("error");
    });
    

  })
  .catch(err => {
    // failure, handle it.
    console.log(`Error scanning file. Reason: ${err}`)
  });
});


</script>

