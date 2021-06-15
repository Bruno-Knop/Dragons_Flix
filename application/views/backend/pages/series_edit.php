<?php
	$series_detail = $this->db->get_where('series',array('series_id'=>$series_id))->row();
?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/series_edit/<?php echo $series_id;?>" enctype="multipart/form-data">
	                <div class="form-group mb-3">
	                    <label for="title"><?php echo get_phrase('Tv_Series_Title'); ?></label>
	                    <input type="text" class="form-control" id = "title" name="title" value="<?php echo $series_detail->title;?>">
	                </div>

	                <div class="form-group mb-3">
	                    <label for="thumb"><?php echo get_phrase('Thumbnail'); ?></label>
						<span class="help">- <?php echo get_phrase('icon_image_of_the_movie'); ?></span>
	                    <input type="file" class="form-control" name="thumb">
	                </div>

	                <div class="form-group mb-3">
	                    <label for="poster"><?php echo get_phrase('Poster'); ?></label>
						<span class="help">- <?php echo get_phrase('large_banner_image_of_the_movie'); ?></span>
	                    <input type="file" class="form-control" name="poster">
	                </div>

					<div class="form-group mb-3">
						<label for="description_short"><?php echo get_phrase('Short_description'); ?></label>
						<textarea class="form-control" id="description_short" name="description_short" rows="6"><?php echo $series_detail->description_short;?></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="description_long"><?php echo get_phrase('Long_description'); ?></label>
						<textarea class="form-control" id="description_long" name="description_long" rows="6"><?php echo $series_detail->description_long;?></textarea>
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
					<div class="row">
						<div class="form-group col-6">
							<input type="submit" class="btn btn-success col-12" value="Update Tv Series">
						</div>
						<div class="col-6">
							<a href="<?php echo base_url();?>index.php?admin/series_list" class="btn btn-secondary col-12"><?php echo get_phrase('Go_back'); ?></a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
	<div class="col-6">
		<div class="card">
            <div class="card-body">
                <h4 class="header-title"><?php echo get_phrase('Seasons_&_episodes'); ?></h4>
				<a href="<?php echo base_url();?>index.php?admin/season_create/<?php echo $series_id;?>"
					class="btn btn-primary pull-right" style="margin-bottom: 20px;">
				<i class="fa fa-plus"></i>
				<?php echo get_phrase('Create_season'); ?>
				</a>

				<table class="table table-hover table-centered mb-0" width="100%">
					<tbody>
						<?php
							$seasons	=	$this->crud_model->get_seasons_of_series($series_id);
							foreach ($seasons as $row):
							?>
						<tr>
							<td>
								<i class="fa fa-dot-circle-o"></i>
								<?php echo $row['name'];?>
							</td>
							<td>
								<?php
									$episodes	=	$this->crud_model->get_episodes_of_season($row['season_id']);
									echo count($episodes);
									?>
								<?php echo get_phrase('episodes'); ?>
							</td>
							<td>
								<a href="<?php echo base_url();?>index.php?admin/season_edit/<?php echo $series_id.'/'.$row['season_id'];?>"
									class="btn btn-info btn-xs btn-mini">
								<?php echo get_phrase('manage_episodes'); ?></a>
								<a href="<?php echo base_url();?>index.php?admin/season_delete/<?php echo $series_id.'/'.$row['season_id'];?>"
									class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Want to delete?')">
								<?php echo get_phrase('delete'); ?></a>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
                </table>
            </div>
        </div>
	</div>
</div>
