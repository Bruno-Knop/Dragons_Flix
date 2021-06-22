<?php include 'header_browse.php';?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/hovercss/demo.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/hovercss/set1.css" />

<style>

	.movie_thumb{}

	.btn_opaque{font-size:20px; border: 1px solid #939393;text-decoration: none;margin: 10px;background-color: rgba(0, 0, 0, 0.74); color: #fff;}

	.btn_opaque:hover{border: 1px solid #939393;text-decoration: none;background-color: rgba(57, 57, 57, 0.74);color:#fff;}

</style>

<!-- TOP FEATURED SECTION -->

<?php

	$featured_movie		=	$this->db->get_where('movie', array('featured'=>1))->row();

	

	?>

<div style="height:85vh;width:100%;background-image: url(<?php echo $this->crud_model->get_poster_url('movie' , $featured_movie->movie_id);?>); background-size:cover;">

	<div style="font-size: 85px;font-weight: bold;clear: both;padding: 200px 0px 0px 50px;color: #fff;">

		<?php echo $featured_movie->title;?>

		<div style="font-size: 20px; letter-spacing: .2px; color: #ccc; font-weight: 100; width:50%;">

			<?php echo $featured_movie->description_short;?>

		</div>

		<a href="<?php echo base_url();?>index.php?browse/playmovie/<?php echo $featured_movie->movie_id;?>" 

			class="btn btn-danger btn-lg" style="font-size: 20px;"> 

		<b><i class="fa fa-play"></i> <?php echo get_phrase('PLAY');?></b>

		</a>

		<!-- ADD OR DELETE FROM PLAYLIST -->

		<span id="mylist_button_holder">

		</span>

		<span id="mylist_add_button" style="display:none;">

		<a href="#" class="btn  btn-lg btn_opaque"

			onclick="process_list('movie' , 'add', <?php echo $featured_movie->movie_id;?>)"> 

		<b><i class="fa fa-plus"></i> <?php echo get_phrase('MY_LIST');?></b>

		</a>

		</span>

		<span id="mylist_delete_button" style="display:none;">

		<a href="#" class="btn  btn-lg btn_opaque"

			onclick="process_list('movie' , 'delete', <?php echo $featured_movie->movie_id;?>)"> 

		<b><i class="fa fa-check"></i> <?php echo get_phrase('MY_LIST');?></b>

		</a>

		</span>

	</div>

</div>

<script>

	// submit the add/delete request for mylist

	// type = movie/series, task = add/delete, id = movie_id/series_id

	function process_list(type, task, id)

	{

		$.ajax({

			url: "<?php echo base_url();?>index.php?browse/process_list/" + type + "/" + task + "/" + id, 

			success: function(result){

			//alert(result);

			if (task == 'add')

			{

				$("#mylist_button_holder").html( $("#mylist_delete_button").html() );

			}

			else if (task == 'delete')

			{

				$("#mylist_button_holder").html( $("#mylist_add_button").html() );

			}

		}});

	}

	

	// Show the add/delete wishlist button on page load

	$( document ).ready(function() {

	

		// Checking if this movie_id exist in the active user's wishlist

		mylist_exist_status = "<?php echo $this->crud_model->get_mylist_exist_status('movie' , $featured_movie->movie_id);?>";

	

		if (mylist_exist_status == 'true')

		{

			$("#mylist_button_holder").html( $("#mylist_delete_button").html() );

		}

		else if (mylist_exist_status == 'false')

		{

			$("#mylist_button_holder").html( $("#mylist_add_button").html() );

		}

	});

	/* When the user clicks on the button, 
	/* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
	function drophomeFilmes() {
		document.getElementById("dropdownhomeFilmes").classList.toggle("show");
	}
	function drophomeSeries() {
		document.getElementById("dropdownhomeSeries").classList.toggle("show");
	}
	function drophomeAnimes() {
		document.getElementById("dropdownhomeAnimes").classList.toggle("show");
	}

	// Close the dropdown if the user clicks outside of it
	window.onclick = function(event) {
	if (!event.target.matches('.droptoggle')) {
		var dropdowns = document.getElementsByClassName("dropdown-home-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
		var openDropdown = dropdowns[i];
		if (openDropdown.classList.contains('show')) {
			openDropdown.classList.remove('show');
		}
		}
	}
	}

</script>

<style>
.droptoggle {
	font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-weight: 500;
	line-height: 1.5;
	font-size: 24px;
	color: #ff0000;
	cursor: pointer;
	transition: all 1s ease-out;
}

.dropdown-home {
  position: static;
  display: inline;
  transition: all 1s ease-out;
}

.dropdown-home-content {
  	display: none;
  	position: static;
  	background-color: #000;
	transition: all 1s ease-out;
}

.dropdown-home-content a {
	padding: 12px 16px;
	display: block;
	transition: all 1s ease-out;
}

.show {
	display: block;
	transition: all 1s ease-out;
}

</style>

<!-- MY LIST, GENRE WISE LISTING & SLIDER -->


<?php 

	$genres		=	$this->crud_model->get_genres();

	foreach ($genres as $row):

		// count movie number of this genre, if no found then return.

		$this->db->where('genre_id' , $row['genre_id']);

        $total_result = $this->db->count_all_results('movie');

        if ($total_result == 0)

        	continue;

?>
<hr class="home_hr" style="height: 0px; margin-top: 0px; border-top: 2px solid #ff0000;">
<h4 class="text_home"><?php echo get_phrase('More_Assisted') ?></h4>
<hr class="home_hr" style="height: 20px;">
<div class="indice_list">
<!-- MOVIES -->
	<!-- <li class="dropdown-home">
		<a1 onclick="drophomeFilmes()" class="droptoggle"><?php echo get_phrase('Movies') ?><span class="caret"></a1>
		<a1 onclick="drophomeSeries()" class="droptoggle" style="margin: 15px;"><?php echo get_phrase('Serial') ?><span class="caret"></a1>
		<a1 onclick="drophomeAnimes()" class="droptoggle" style="margin: 15px;"><?php echo get_phrase('Animes') ?><span class="caret"></a1>
		<hr class="home_hr">
	<ul id="dropdownhomeFilmes" class="dropdown-home-content" aria-labelledby="themes"> -->
	<h4 class="text_home"><?php echo get_phrase('Movies') ?></h4>
	<hr class="home_hr">
	<div class="genre_list">
		<div class="row">

			<h4><?php echo $row['name'];?></h4>

			<div class="content">

				<div class="grid">

					<?php 

						$movies	= $this->crud_model->get_movies($row['genre_id'] , 5, 0);

						foreach ($movies as $row)

						{

							$title	=	$row['title'];

							$link	=	base_url().'index.php?browse/playmovie/'.$row['movie_id'];

							$thumb	=	$this->crud_model->get_thumb_url('movie' , $row['movie_id']);

							include 'thumb.php';

						}

						?>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
<!-- MOVIES END -->
	
<!-- SERIES -->
	<?php 

		$genres		=	$this->crud_model->get_genres();

		foreach ($genres as $row):

			// count movie number of this genre, if no found then return.

			$this->db->where('genre_id' , $row['genre_id']);

			$total_result = $this->db->count_all_results('movie');

			if ($total_result == 0)

				continue;

	?>
	<h4 class="text_home"><?php echo get_phrase('Serial') ?></h4>
	<hr class="home_hr">
	<div class="genre_list">
		<div class="row">

			<h4><?php echo $row['name'];?></h4>

			<div class="content">

				<div class="grid">

					<?php 

						$series	= $this->crud_model->get_series($row['genre_id'] , 5, 0);

						foreach ($series as $row)

						{

							$title	=	$row['title'];

							$link	=	base_url().'index.php?browse/playseries/'.$row['series_id'];

							$thumb	=	$this->crud_model->get_thumb_url('series' , $row['series_id']);

							include 'thumb.php';

						}

						?>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
<!-- SERIES END -->

<!-- ANIMES -->
	<?php 

		$genres		=	$this->crud_model->get_genres();

		foreach ($genres as $row):

			// count movie number of this genre, if no found then return.

			$this->db->where('genre_id' , $row['genre_id']);

			$total_result = $this->db->count_all_results('movie');

			if ($total_result == 0)

				continue;

	?>
	<h4 class="text_home"><?php echo get_phrase('Animes') ?></h4>
	<hr class="home_hr">
	<div class="genre_list">
		<div class="row">

			<h4><?php echo $row['name'];?></h4>

			<div class="content">

				<div class="grid">

					<?php 

						$animes	= $this->crud_model->get_animes($row['genre_id'] , 5, 0);

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
		</div>
	</div>
	<?php endforeach;?>
<!-- ANIMES END -->
</div>



<hr class="home_hr">
<div class="container" style="margin-top: -40px; margin-left: -20px;">
	
	<?php include 'footer.php';?>
	
</div>