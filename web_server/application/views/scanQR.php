

<script src="<?=base_url('plugins/qr-scanner/html5-qrcode.js')?>"></script>

<input type="file" id="qr-input-file" accept="image/*" capture>

<div id="reader" ></div>

<script type="text/javascript">
const html5QrCode = new Html5Qrcode(/* element id */ "reader");
// File based scanning
const fileinput = document.getElementById('qr-input-file');
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
  })
  .catch(err => {
    // failure, handle it.
    console.log(`Error scanning file. Reason: ${err}`)
  });
});


</script>

