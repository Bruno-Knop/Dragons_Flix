<?php include 'header_browse.php';?>



<style>

	table{

		background-color: rgb(243, 243, 243);

	}

</style>



<div class="container" style="margin-top: 90px;">

	<div class="row">

		<div class="col-lg-12">

			<h3 class="white_text"><?php echo get_phrase('billing_history');?></h3>

			<hr>

		</div>

		<div class="col-lg-8">

			<table class="table table-striped table-hover" style="color: #000;">

				<tbody>

					<tr style="background-color: rgb(243, 243, 243); color: #999; border-bottom: 1px solid #ddd;">

						<td><?php echo get_phrase('date');?></td>

						<td><?php echo get_phrase('package');?></td>

						<td><?php echo get_phrase('service_period');?></td>

						<td><?php echo get_phrase('payment_method');?></td>

						<td><?php echo get_phrase('total');?></td>

					</tr>

					<?php 

					$user_id				=	$this->session->userdata('user_id');

					$subscription_history	=	$this->crud_model->get_subscription_of_user($user_id);

					foreach ($subscription_history as $row):

					?>

					<tr style="background-color: rgb(243, 243, 243);color: #333; border-bottom: 1px solid #ddd;">

						<td>

							<?php echo date("d M, Y" , $row['payment_timestamp']);?>

						</td>

						<td>

							<?php echo $this->db->get_where('plan', array('plan_id'=>$row['plan_id']))->row()->name;?>

						</td>

						<td>

							<?php echo date("d M, Y" , $row['timestamp_from']);?>

							-

							<?php echo date("d M, Y" , $row['timestamp_to']);?>

						</td>

						<td>

							<?php echo $row['payment_method'];?>

						</td>

						<td>

							USD <?php echo $row['paid_amount'];?>

						</td>

					</tr>

					<?php endforeach;?>

				</tbody>

			</table>

			<a href="<?php echo base_url();?>index.php?browse/youraccount" class="btn btn-default"><?php echo get_phrase('go_back');?></a>

		</div>

	</div>

	<hr>

	<?php include 'footer.php';?>

</div>





