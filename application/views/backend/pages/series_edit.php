<?php
	$series_detail = $this->db->get_where('series',array('series_id'=>$series_id))->row();
?>
<form method="post" action="<?php echo base_url();?>index.php?admin/series_edit/<?php echo $series_id;?>" enctype="multipart/form-data">
	<div class="row">
	    <div class="col-6">
	        <div class="card">
	            <div class="card-body">
					<div class="form-group mb-3">
	                    <label for="simpleinput1"><?php echo get_phrase('Series_Title'); ?></label>
	                    <input type="text" class="form-control" id = "simpleinput1" name="title" value="<?php echo $series_detail->title;?>">
	                </div>
					<div class="form-group mb-3">
	                    <label for="url"><?php echo get_phrase('Video_Url'); ?></label>
						<span class="help">- <?php echo get_phrase('youtube_or_any_hosted_video'); ?></span>
	                    <input type="text" class="form-control" name="url" id="url" value="<?php echo $series_detail->url;?>">
	                </div>

					<div class="form-group mb-3">
	                    <label for=""><?php echo get_phrase('Thumbnail'); ?></label>
						<span class="help">- <?php echo get_phrase('icon_image_of_the_movie'); ?></span>
	                    <input type="file" class="form-control" name="thumb">
	                </div>

					<div class="form-group mb-3">
	                    <label for=""><?php echo get_phrase('Poster'); ?></label>
						<span class="help">- <?php echo get_phrase('large_banner_image_of_the_movie'); ?></span>
	                    <input type="file" class="form-control" name="poster">
	                </div>

					<div class="form-group mb-3">
						<label for="description_long"><?php echo get_phrase('Long_description'); ?></label>
						<textarea class="form-control" id="description_long" name="description_long" rows="6"><?php echo $series_detail->description_short;?></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="description_short"><?php echo get_phrase('Short_description'); ?></label>
						<textarea class="form-control" id="description_short" name="description_short" rows="6"><?php echo $series_detail->description_long;?></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="actors"><?php echo get_phrase('Actors'); ?></label>
						<span class="help">- <?php echo get_phrase('select_multiple_actors'); ?></span>
						<select class="form-control select2" id="actors" multiple name="actors[]">
							<?php
								$actors	=	$this->db->get('actor')->result_array();
								foreach ($actors as $row2):?>
							<option
								<?php
									$actors	=	$series_detail->actors;
									if ($actors != '')
									{
										$actor_array	=	json_decode($actors);
										if (in_array($row2['actor_id'], $actor_array))
											echo 'selected';
									}
									?>
								value="<?php echo $row2['actor_id'];?>">
								<?php echo $row2['name'];?>
							</option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="genre_id"><?php echo get_phrase('Genre'); ?></label>
						<span class="help">- <?php echo get_phrase('genre_must_be_selected'); ?></span>
						<select class="form-control select2" id="genre_id" name="genre_id">
							<?php
								$genres	=	$this->crud_model->get_genres();
								foreach ($genres as $row2):?>
							<option
								<?php if ( $series_detail->genre_id == $row2['genre_id']) echo 'selected';?>
								value="<?php echo $row2['genre_id'];?>">
								<?php echo $row2['name'];?>
							</option>
							<?php endforeach;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="year"><?php echo get_phrase('Publishing_Year'); ?></label>
						<span class="help">- <?php echo get_phrase('year_of_publishing_time'); ?></span>
						<select class="form-control select2" id="year" name="year">
							<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
							<option
								<?php if ( $series_detail->year == $i) echo 'selected';?>
								value="<?php echo $i;?>">
								<?php echo $i;?>
							</option>
							<?php endfor;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="rating"><?php echo get_phrase('Rating'); ?></label>
						<span class="help">- <?php echo get_phrase('star_rating_of_the_movie'); ?></span>
						<select class="form-control select2" id="rating" name="rating">
							<?php for ($i = 0; $i <= 5 ; $i++):?>
							<option
								<?php if ( $series_detail->rating == $i) echo 'selected';?>
								value="<?php echo $i;?>">
								<?php echo $i;?>
							</option>
							<?php endfor;?>
						</select>
					</div>

					<div class="form-group mb-3">
						<label for="featured"><?php echo get_phrase('Featured'); ?></label>
						<span class="help">- <?php echo get_phrase('featured_movie_will_be_shown_in_home_page'); ?></span>
						<select class="form-control select2" id="featured" name="featured">
							<option value="0" <?php if ( $series_detail->featured == 0) echo 'selected';?>><?php echo get_phrase('select_No');?></option>
							<option value="1" <?php if ( $series_detail->featured == 1) echo 'selected';?>><?php echo get_phrase('select_Yes');?></option>
						</select>
					</div>
	            </div>
	        </div>
	    </div>
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label class="form-label"><?php echo get_phrase('Preview:'); ?></label>

						<!-- Video player generator starts -->
						<?php if (video_type($series_detail->url) == 'youtube'): ?>
							<!------------- PLYR.IO ------------>
							<link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">

							<div class="plyr__video-embed" id="player">
							    <iframe src="<?php echo $series_detail->url;?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
							</div>

							<script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
							<script>const player = new Plyr('#player');</script>

							<!------------- PLYR.IO ------------>
						<?php elseif (video_type($series_detail->url) == 'topflix'): ?>
							<div class="plyr__video-embed" id="player">
								<iframe src="<?php echo $series_detail->url; ?>" allowfullscreen allowtransparency frameborder = "0" width="743.5" height="464.69"></iframe>
							</div>
						<?php elseif (video_type($series_detail->url) == 'vimeo'):
							$vimeo_video_id = get_vimeo_video_id($series_detail->url); ?>
							<link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">

							<div class="plyr__video-embed" id="player">
							    <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_video_id; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
							</div>

							<script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
							<script>const player = new Plyr('#player');</script>
						<?php else :?>
							<link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">
							<video poster="<?php echo $this->crud_model->get_thumb_url('series' , $series_detail->series_id);?>" id="player" playsinline controls>
							<?php if (get_video_extension($series_detail->url) == 'mp4'): ?>
								<source src="<?php echo $series_detail->url; ?>" type="video/mp4">
							<?php elseif (get_video_extension($series_detail->url) == 'webm'): ?>
								<source src="<?php echo $series_detail->url; ?>" type="video/webm">
							<?php else: ?>
								<h4><?php get_phrase('video_url_is_not_supported'); ?></h4>
							<?php endif; ?>
							</video>

							<script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
							<script>const player = new Plyr('#player');</script>
						<?php endif; ?>
						<!-- Video player generator ends -->

					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="col-6">
			<div class="row">
				<div class="form-group col-6">
					<input type="submit" class="btn btn-success col-12" value="<?php echo get_phrase('update_series'); ?>">
				</div>
				<div class="col-6">
					<a href="<?php echo base_url();?>index.php?admin/series_list" class="btn btn-secondary col-12"><?php echo get_phrase('Go_Back'); ?></a>
				</div>
			</div>
		</div>
	</div>
</form>
