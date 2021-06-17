<a href="<?php echo base_url();?>index.php?admin/animes_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
<?php echo get_phrase('Create_animes'); ?>
</a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><?php echo get_phrase('Animes_Title'); ?></h4>
                <table id="basic-datatable" class="table dt-responsive nowrap" width="100%">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th></th>
							<th><?php echo get_phrase('Animes_Title'); ?></th>
							<th><?php echo get_phrase('Genre'); ?></th>
							<th><?php echo get_phrase('Operation'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$animes = $this->db->get('animes')->result_array();
							$counter = 1;
							foreach ($animes as $row):
							  ?>
						<tr>
							<td style="vertical-align: middle;"><?php echo $counter++;?></td>
							<td><img src="<?php echo $this->crud_model->get_thumb_url('animes' , $row['animes_id']);?>" style="height: 60px;" /></td>
							<td style="vertical-align: middle;"><?php echo $row['title'];?></td>
							<td style="vertical-align: middle;">
								<?php echo $this->db->get_where('genre',array('genre_id'=>$row['genre_id']))->row()->name;?>
							</td>
							<td style="vertical-align: middle;">
								<a href="<?php echo base_url();?>index.php?browse/playanimes/<?php echo $row['animes_id'];?>"
									target="_blank" class="btn btn-secondary btn-xs btn-mini">
								<i class="fa fa-external-link"></i><?php echo get_phrase('visit'); ?></a>
								<a href="<?php echo base_url();?>index.php?admin/animes_edit/<?php echo $row['animes_id'];?>" class="btn btn-info btn-xs btn-mini">
								<?php echo get_phrase('manage'); ?></a>
								<a href="<?php echo base_url();?>index.php?admin/animes_delete/<?php echo $row['animes_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Want to delete?')">
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
