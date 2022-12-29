<?php $this->load->view('main/header2'); ?>

<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url('C_login/aksi_login'); ?>" method="post">
					<span class="login100-form-title p-b-43">
						Login Siawarak
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: url('<?php echo base_url('assets/login/images/'); ?>bg-siwarak.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	
<?php $this->load->view('main/footer2'); ?>