<!-- TOP LANDING SECTION -->
<div class="lading_selection">
	<!-- logo -->
	<div style="float: left;">
		<a href="<?php echo base_url();?>index.php?home">
		<img src="<?php echo base_url();?>/assets/global/logo.png" class="logo_img"/>
		</a>
	</div>
	<div style="float: right;margin: 20px 40px 0px 40px; height: 50px;">
		<a href="<?php echo base_url();?>index.php?home/signin" class="btn btn-danger">
        <?php echo get_phrase('sign_in');?></a>
	</div>
</div>
<!-- ERROR MESSAGE -->
<style>
	td{padding: 12px 15px; border-bottom: 1px solid #ccc; color: #fff;}
</style>
<div class="container">
	<div class="row center">
		<!-- ERROR MESSAGE SHOWING IF DUPLICATE EMAIL FOUND -->
		<?php 
			if ($this->session->flashdata('signup_result') == 'failed'):
			?>
		<div class="alert alert-dismissible alert-danger" style="margin: 30px;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo get_phrase('Email_already_exists! Please_try_again');?>.
		</div>
		<?php endif;?>
		<div class="col-lg-12" style="margin: 0px 20px;">
			<h3 class="white_text"><?php echo get_phrase('Sign_up_to_start_your_membership');?></h3>
		</div>
		<div class="col-lg-12" style="margin: 0px 20px;">
			<h4 class="white_text"><?php echo get_phrase('Create_your_account');?>:</h4>
		</div>
		<div class="col-lg-12" style="margin: 0px 20px;">
			<form method="post" action="<?php echo base_url();?>index.php?home/signup">
                <div style="margin:10px 0px 5px;">
					<?php echo get_phrase('Your_name');?>
				</div>
                <div class="black_text_input">
					<input type="name" name="name" style="padding: 10px; width:400px;" autocomplete="off"  placeholder="" required>
				</div>
				<div style="margin:10px 0px 5px;">
					<?php echo get_phrase('Email_Address');?>
				</div>
				<div class="black_text_input">
					<input type="email" name="email" style="padding: 10px; width:400px;" autocomplete="off"  placeholder="" required>
				</div>
				<div style="margin:10px 0px 5px;">
					<?php echo get_phrase('Password');?>
				</div>
				<div class="black_text_input">
					<input type="password" name="password"  style="padding: 10px; width:400px;" minlength="6"  placeholder="" required>
				</div>
				<button type="submit"  class="btn btn-danger" style=" width: 150px; margin: 20px 0px;">
					<?php echo get_phrase('Register');?></button>
			</form>
		</div>
	</div>
	<hr class="signup_hr">
	<?php include 'footer.php';?>
</div>