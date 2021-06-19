<!-- TOP LANDING SECTION -->

<div class="lading_selection">

	<!-- logo -->

	<div style="float: left;">

		<a href="<?php echo base_url();?>index.php?home">

		<img src="<?php echo base_url();?>/assets/global/logo.png" style="margin: 18px 40px; height: 50px;" />

		</a>

	</div>

</div>

<div class="container">

	<div class="row">

		<div class="col-lg-12">

			<h4 class="white_text"><?php echo get_phrase('Refund_Policy');?></h4>

		</div>

		<div class="col-lg-12" style="margin:20px;">

			<div class="row">

				<?php

					echo $this->db->get_where('settings',array('type'=>'refund_policy'))->row()->description;

					?>

			</div>

		</div>

	</div>

	<?php include 'footer.php';?>

</div>