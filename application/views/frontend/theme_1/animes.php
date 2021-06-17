<?php include 'header_browse.php';?>

<!-- TV SERIAL LIST, GENRE WISE LISTING -->

<div class="row" style="margin:20px 60px;">

	<h4 style="text-transform: capitalize;">

		<?php echo $this->db->get_where('genre', array('genre_id' => $genre_id))->row()->name;?> 

			<?php echo get_phrase('Animes');?> (<?php echo $total_result;?>)

	</h4>

	<div class="content">

		<div class="grid">

			<?php 

				foreach ($animes as $row)

				{

					$title	=	$row['title'];

					$link	=	base_url().'index.php?browse/playanimes/'.$row['animes_id'];

					$thumb	=	$this->crud_model->get_thumb_url('animes' , $row['animes_id']);

					include 'thumb.php';

				}

				?>

		</div>

	</div>

	<div style="clear: both;"></div>

	<ul class="pagination">

		<?php echo $this->pagination->create_links(); ?>

	</ul>

</div>

<div class="container" style="margin-top: 90px;">

	<hr style="border-top:1px solid #333;">

	<?php include 'footer.php';?>

</div>