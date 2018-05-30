<!DOCTYPE html>
<html lang="en">
<head>
	<title>Produksi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('') ?>assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>assets/css/main.css">
<!--===============================================================================================-->
</head>
 
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/sokressh1.jpg');">
			<div class="wrap-login100">
			<?php echo form_open('CreateUser/createDataUser'); ?>
				<form class="login100-form validate-form">
				<span class="login100-form-logo">
						<!-- <i class="zmdi zmdi-landscape"></i> -->
						<img src="<?php echo base_url('') ?>assets/images/sokressh2.jpg" style="border-radius: 50%; width:100px; height:100px;" alt="">
					</span>


		  	<center><h1>Sign Up</h1><center>
          	<!-- <?php echo form_open_multipart('CreateUser/createDataUser') ?> -->
          	<form action="/" method="post">
          	<?php echo validation_errors(); ?>
          	<div class="container-login100-form-btn">
          	<div class="field-wrap">
            <label>
              Set your username <span class="req">*</span>
            </label>
            <input type="text" id="username" name="username" class="input" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
            <label>
              Set your password <span class="req">*</span>
            </label>
            <input type="password" id="password" name="password" class="input" required autocomplete="off"/>
            </div>
            </div>
            </form>
            </form>
                        </br>

            <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" />
              GET STARTED
            </button>
            </div>
            </br>
        
          
          	<?php echo form_close(); ?>
          	<div class="container-login100-form-btn">
			<button class="login100-form-btn"><a href="<?php echo site_url('login') ?>">CANCEL</a>
			</button>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
	<script src="<?php echo base_url('') ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('') ?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('') ?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('') ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url('') ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('') ?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('') ?>assets/js/main.js"></script>

</body>
</html>