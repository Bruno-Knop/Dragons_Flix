<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/animes_create" enctype="multipart/form-data">
	                <div class="form-group mb-3">
	                    <label for="title"><?php echo get_phrase('Animes_Title'); ?></label>
	                    <input type="text" class="form-control" id = "title" name="title">
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
						<textarea class="form-control" id="description_short" name="description_short" rows="6"></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="description_long"><?php echo get_phrase('Long_description'); ?></label>
						<textarea class="form-control" id="description_long" name="description_long" rows="6"></textarea>
					</div>

					<div class="form-group mb-3">
						<label for="actors"><?php echo get_phrase('Actors'); ?></label>
						<span class="help">- <?php echo get_phrase('select_multiple_actors'); ?></span>
						<select class="form-control select2" id="actors" multiple name="actors[]">
							<?php
								$actors	=	$this->db->get('actor')->result_array();
								foreach ($actors as $row2):?>
							<option value="<?php echo $row2['actor_id'];?>">
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
							<option value="<?php echo $row2['genre_id'];?>">
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
							<option value="<?php echo $i;?>">
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
							<option value="<?php echo $i;?>">
								<?php echo $i;?>
							</option>
							<?php endfor;?>
						</select>
					</div>
					<div class="row">
						<div class="form-group col-6">
							<input type="submit" class="btn btn-success col-12" value="Create">
						</div>
						<div class="col-6">
							<a href="<?php echo base_url();?>index.php?admin/animes_list" class="btn btn-secondary col-12"><?php echo get_phrase('Go_back'); ?></a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
