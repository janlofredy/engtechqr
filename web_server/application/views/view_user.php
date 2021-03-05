<?php
// echo $qr;
// echo '<center><pre>';
// print_r( ($this->session->userdata()) );
// echo '</pre></center>';
?>
<div id="qrcode" class="d-none">
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
            You may screenshot, save as image, download it as PDF or send it to your email.
            <br>
            This is your unique and permanent QR Code (<b id="qrcode">BASKJNQWIHD</b>).
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
                <div class="row">
                  <div class="col">
                    <?php if (isset($qr)) {
                      echo $qr;
                    }else {
                      echo '<img src="'.base_url().'assets/image/logo.png" alt="">';
                    }?>
                    <h6><b>KKSCYWLPk</b></h6>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col">
                    <?php if (isset($profile)) {
                      echo $profile;
                    }else {
                      echo '<img src="'.base_url().'assets/image/blank-image.png" alt="" width="100">';
                    }?>
                    <p>
                      <h5 style="color:#074886;"><b>Jose Janlofre</b></h5>
                      <label style="margin-bottom:0px;color:black;"><b>Cabadbaran City</b></label><br>
                      <small><b>City/Municipality</b></small>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <a onclick="" class="btn btn-primary text-white"
    								style="
    								background-color: #074886;
    								width: 200px;
    								border-top-left-radius: 30px 16px;
    								border-bottom-left-radius: 30px 16px;
    								border-top-right-radius: 30px 16px;
    								border-bottom-right-radius: 30px 16px;
    								"><i id="nav_btn_icon" class="fa fa-save"></i> Save Image</a>
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
                    "><i id="nav_btn_icon" class="fa fa-paper-plane"></i> Send ID to email</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>
</div>
