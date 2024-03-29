<!-- TOP HEADING SECTION -->
<style>
	.nav_transparent {
	padding: 10px 0px 10px; border: 1px;
	background: rgba(0,0,0,0.8); 
	}
	.nav_dark {
	background-color: #000;
	padding: 10px;
	}
</style>
<?php 
	if ($page_name == 'home' || $page_name == 'playmovie') 
		$nav_type = 'nav_transparent';
	else 
		$nav_type = 'nav_dark';
	?>
<div class="navbar navbar-default navbar-fixed-top <?php echo $nav_type;?>" >
	<div class="container" style=" width: 100%;">
		<div class="navbar-header">
			<a href="<?php echo base_url();?>index.php?browse/home" class="navbar-brand-logo">
				<img src="<?php echo base_url();?>/assets/global/logo.png" style="height: 100%;" />
			</a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<script>
			function redirect(type){
				if(type === 'Movies'){
					document.getElementById("caretMovies").classList.toggle("open");
					winclick();
				}else if(type === 'Serial'){
					document.getElementById("caretSerial").classList.toggle("open");
					winclick();
				}else if(type === 'Animes'){
					document.getElementById("caretAnimes").classList.toggle("open");
					winclick();
				}
			}
			function winclick() {
				window.onclick = function(event) {
					if (!event.target.matches('.dropdown-menu')) {
						var dropdowns = document.getElementsByClassName("caret");
						var i;
						for (i = 0; i < dropdowns.length; i++) {
						var openDropdown = dropdowns[i];
						if (openDropdown.classList.contains('open')) {
							openDropdown.classList.remove('open');
						}
						}
					}
				}
			}
			
		</script>

		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<!-- MOVIES GENRE WISE-->
				<li onclick="redirect('Movies')" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="" style="color: #e50914; font-weight: bold;">
						<?php echo get_phrase('Movie');?> <span onclick="caretMovies()" id="caretMovies" class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<?php
							$genres		=	$this->crud_model->get_genres();
							foreach ($genres as $row):
							?>
						<li><a href="<?php echo base_url();?>index.php?browse/movie/<?php echo $row['genre_id'];?>">
							<?php 
								echo $row['name'];
								// shows number of movies available
								$this->db->where('genre_id', $row['genre_id']);
								$num_rows = $this->db->count_all_results('movie');
								if ($num_rows > 0)
									echo ' (' . $num_rows . ')';
							?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
				</li>
				<!-- SERIES GENRE WISE-->
				<li onclick="redirect('Serial')" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="" style="color: #e50914; font-weight: bold;">
						<?php echo get_phrase('Serial');?> <span onclick="caretSerial()" id="caretSerial" class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<?php
							$genres		=	$this->crud_model->get_genres();
							foreach ($genres as $row):
							?>
						<li><a href="<?php echo base_url();?>index.php?browse/series/<?php echo $row['genre_id'];?>">
							<?php 
								echo $row['name'];
								// shows number of movies available
								$this->db->where('genre_id', $row['genre_id']);
								$num_rows = $this->db->count_all_results('series');
								if ($num_rows > 0)
									echo ' (' . $num_rows . ')';
							?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
				</li>
				<!-- ANIMES GENRE WISE-->
				<li onclick="redirect('Animes')" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="" style="color: #e50914; font-weight: bold;">
						<?php echo get_phrase('Animes');?> <span onclick="caretAnimes()" id="caretAnimes" class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<?php
							$genres		=	$this->crud_model->get_genres();
							foreach ($genres as $row):
							?>
						<li><a href="<?php echo base_url();?>index.php?browse/animes/<?php echo $row['genre_id'];?>">
							<?php 
								echo $row['name'];
								// shows number of movies available
								$this->db->where('genre_id', $row['genre_id']);
								$num_rows = $this->db->count_all_results('animes');
								if ($num_rows > 0)
									echo ' (' . $num_rows . ')';
							?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
				</li>
				<!-- MY LIST -->
				<li>
					<a href="<?php echo base_url();?>index.php?browse/mylist"><?php echo get_phrase('My_List');?></a>
				</li>
			</ul>
			<!-- PROFILE, ACCOUNT SECTION -->
			<?php
				// by deault, email & general thumb shown at top
				$bar_text	=	$this->db->get_where('user', array('user_id'=>$this->session->userdata('user_id')))->row()->name;
				$bar_thumb	=	'thumb1.png';
				
				// check if there is active subscription
				$subscription_validation	=	$this->crud_model->validate_subscription();
				if ($subscription_validation != false)
				{
					// if there is active subscription, check the selected/active user of current user account
				
					$active_user	=	$this->session->userdata('active_user');
					if ($active_user == 'user1')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user1');
						$bar_thumb	=	'thumb1.png';
					}
					else if ($active_user == 'user2')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user2');
						$bar_thumb	=	'thumb2.png';
					}
					else if ($active_user == 'user3')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user3');
						$bar_thumb	=	'thumb3.png';
					}
					else if ($active_user == 'user4')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user4');
						$bar_thumb	=	'thumb4.png';
					}
				}
				?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding:10px;">
					<img src="<?php echo base_url();?>assets/global/user_thumb/<?php echo $bar_thumb;?>" 
						style="height:30px; border-radius: 50%;" />
					<?php echo $bar_text;?>
					<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<?php 
							// user list shown only if there is active subscription 
							if ($subscription_validation != false):
							  $current_plan_id	=	$this->crud_model->get_current_plan_id();
							  ?>
						<li>
							<a href="<?php echo base_url();?>index.php?browse/doswitch/user1">
							<img src="<?php echo base_url();?>assets/global/user_thumb/thumb1.png" 
								style="height:30px; margin: 5px; border-radius: 50%;" />
								<?php echo $this->crud_model->get_username_of_user('user1');?>
							</a>
						</li>
						<?php
							if ($current_plan_id == 2 || $current_plan_id == 3):
							?>
						<li>
							<a href="<?php echo base_url();?>index.php?browse/doswitch/user2">
							<img src="<?php echo base_url();?>assets/global/user_thumb/thumb2.png" 
								style="height:30px; margin: 5px; border-radius: 50%;" />
								<?php echo $this->crud_model->get_username_of_user('user2');?>
							</a>
						</li>
						<?php endif;?>
						<?php
							if ($current_plan_id == 3):
							?>
						<li>
							<a href="<?php echo base_url();?>index.php?browse/doswitch/user3">
							<img src="<?php echo base_url();?>assets/global/user_thumb/thumb3.png" 
								style="height:30px; margin: 5px; border-radius: 50%;" />
								<?php echo $this->crud_model->get_username_of_user('user3');?>
							</a>
						</li>
						<?php endif;?>
						<?php
							if ($current_plan_id == 3):
							?>
						<li>
							<a href="<?php echo base_url();?>index.php?browse/doswitch/user4">
							<img src="<?php echo base_url();?>assets/global/user_thumb/thumb4.png" 
								style="height:30px; margin: 5px; border-radius: 50%;" />
								<?php echo $this->crud_model->get_username_of_user('user4');?>
							</a>
						</li>
						<?php endif;?>
						<?php endif;?>
						<li class="divider"></li>
						<li><a href="<?php echo base_url();?>index.php?browse/manageprofile"><?php echo get_phrase('Manage_Profiles');?></a></li>
						<li class="divider"></li>
						<!-- SHOW ADMIN LINK IF ADMIN LOGGED IN -->
						<?php 
							if($this->session->userdata('login_type') == 1):
								?>
						<li><a href="<?php echo base_url();?>index.php?admin/dashboard"><?php echo get_phrase('Admin');?></a></li>
						<?php endif;?>
						<li><a href="<?php echo base_url();?>index.php?browse/youraccount"><?php echo get_phrase('Account');?></a></li>
						<li><a href="<?php echo base_url();?>index.php?home/signout"><?php echo get_phrase('Sign_out');?></a></li>
					</ul>
				</li>
			</ul>
			<!-- SEARCH FORM -->
			<form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>index.php?browse/search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="<?php echo get_phrase('Titles,_actors,_genres');?>" 
						style="background-color: #000; border: 1px solid #808080; height:35px;" name="search_key">
				</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
	</div>
</div>
<?php 
	if ($page_name == 'home' || $page_name == 'playmovie' || $page_name == 'playseries' || $page_name == 'playanimes')
		$padding_amount = '0px';
	else
		$padding_amount = '50px';
	?>
<div style="padding: <?php echo $padding_amount;?>;"></div>