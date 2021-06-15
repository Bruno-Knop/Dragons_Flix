<?php
	$genre_detail = $this->db->get_where('genre',array('genre_id'=>$genre_id))->row();
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/genre_edit/<?php echo $genre_id;?>">
					<div class="row justify-content-center">
						<div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="form-group mb-3">
			                    <label for="name"><?php echo get_phrase('Genre_Name'); ?></label>
								<span class="help"><?php echo get_phrase('e.g. "Action, Romantic"'); ?></span>
			                    <input type="text" class="form-control" id = "name" name="name" value="<?php echo $genre_detail->name;?>">
			                </div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Update">
								<a href="<?php echo base_url();?>index.php?admin/genre_list" class="btn btn-secondary"><?php echo get_phrase('Go_Back'); ?></a>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
