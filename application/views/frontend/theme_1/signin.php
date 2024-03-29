<!-- TOP LANDING SECTION -->
<div class="lading_selection" style="height:93vh;width:100%;background-image: url(<?php echo base_url().'assets/frontend/'.$selected_theme;?>/images/login_bg.jpg)">
	<!-- logo -->
	<div style="float: left;">
		<a href="<?php echo base_url();?>index.php?home">
		<img src="<?php echo base_url();?>/assets/global/logo.png" class="logo_img" />
		</a>
	</div>
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4" style="clear: both;">
			<div class="signin_style">
				<?php 
					if ($this->session->flashdata('signin_result') == 'failed'):
					?>
				<!-- ERROR MESSAGE -->
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo get_phrase('Login_failed! Please_try_again.');?>
				</div>
				<?php endif;?>
				<form method="post" action="<?php echo base_url();?>index.php?home/signin">
					<h3 class="white_text"><?php echo get_phrase('sign_in');?></h3>
					<div class="white_text">
						<?php echo get_phrase('Email');?> 
					</div>
					<div class="black_text_input">
						<input type="email" name="email" style="padding: 10px; width:100%;"  placeholder=""  
                        
                         required>
					</div>
					<div class="white_text" style="margin-top: 20px;">
						<?php echo get_phrase('Password');?>
					</div>
					<div class="black_text_input">
						<input type="password" name="password" style="padding: 10px; width:100%;" placeholder="" 
                        
                         required>
					</div>
					<button class="btn btn-danger" style=" width: 100%; margin: 20px 0px;"> <?php echo get_phrase('sign_in');?> </button>
				</form>
				<hr class="signup_hr">
				<a href="<?php echo base_url();?>index.php?home/forget"><?php echo get_phrase('Forget_password');?>?</a>
				|
				<a href="<?php echo base_url();?>index.php?home/signup"><?php echo get_phrase('Sign_up');?></a>
			</div>
		</div>
	</div>
</div>
<!-- MIDDLE TAB SECTION -->
<div class="container">
	<?php include 'footer.php';?>
</div>