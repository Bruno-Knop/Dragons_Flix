<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<form method="post" action="<?php echo base_url();?>index.php?admin/user_create" enctype="multipart/form-data">
					<div class="row">
						<div class="col-6">
							<div class="form-group mb-3">
			                    <label for="name"><?php echo get_phrase('User_Name'); ?></label>
			                    <input type="text" class="form-control" id = "name" name="name">
			                </div>

							<div class="form-group mb-3">
			                    <label for="email"><?php echo get_phrase('User_Email'); ?></label>
			                    <input type="email" class="form-control" id = "email" name="email">
			                </div>
							<div class="form-group mb-3">
			                    <label for="password"><?php echo get_phrase('User_Password'); ?></label>
			                    <input type="password" class="form-control" id = "password" name="password">
			                </div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Create">
								<a href="<?php echo base_url();?>index.php?admin/user_list" class="btn btn-secondary"><?php echo get_phrase('Go_back'); ?></a>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
