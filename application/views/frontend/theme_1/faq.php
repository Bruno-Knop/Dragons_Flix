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

			<h4 class="white_text"><?php echo get_phrase('Frequently_asked_question');?></h4>

		</div>

		<?php 

		$faqs	=	$this->db->get('faq')->result_array();

		foreach ($faqs as $row):

		?>

		<div class="col-lg-12">

			<div class="row">

				<div class="col-lg-1">

					<img src="<?php echo base_url().'assets/frontend/'.$selected_theme;?>/images/faq_icon.png" style="margin-top: 18px; width:40px;" />

				</div>

				<div class="col-lg-11">

					<h3 class="white_text">

						<?php echo $row['question'];?>

					</h3>

					<?php echo $row['answer'];?> 

					<hr>

				</div>

			</div>

		</div>

		<?php endforeach;?>

	</div>

	<?php include 'footer.php';?>

</div>





