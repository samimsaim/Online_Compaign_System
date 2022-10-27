<!-- Top Header-Profile -->
<?php foreach ($kandidInfo as $kanInfo) {}?>
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="<?=base_url().$kanInfo->kan_cover?>" alt="<?=$kanInfo->kan_name?>" style="width: 1920px; height: 360px;">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="<?=base_url()?>index.php/indexController/kandidProfile?id=<?=$_GET['id'];?>" class="active">Timeline</a>
									</li>
									<li>
										<a href="<?=base_url()?>index.php/kandidController/about?id=<?=$_GET['id'];?>">About</a>
									</li>
									<li>
										<a href="<?=base_url()?>index.php/kandidController/follower?id=<?=$_GET['id'];?>">Follower</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="<?=base_url()?>index.php/kandidController/photo?id=<?=$_GET['id'];?>">Photos</a>
									</li>
									<li>
										<a href="<?=base_url()?>index.php/kandidController/video?id=<?=$_GET['id'];?>">Videos</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
						<?php if(isset($_SESSION['level']) && $_SESSION['level'] == "people"):?>
							<?php if($follow == true){?>
							<a href="<?=base_url();?>index.php/indexController/deleteFollow/<?=$_GET['id'];?>" class="btn btn-control bg-green">
								<svg class="olymp-star-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
							</a>
						<?php } else{?>
							<a href="<?=base_url();?>index.php/indexController/follow/<?=$_GET['id'];?>" class="btn btn-control bg-blue">
								<svg class="olymp-star-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
							</a>
						<?php } endif;?>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>
							<?php if(isset($_SESSION['level']) && $_SESSION['level'] != "people"):?>
							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									
									<li>
										<a href="http://localhost:88/kandid/admin/">Account Settings</a>
									</li>
								</ul>
							</div>
						<?php endif;?>
						</div>
					</div>
					<div class="top-header-author">
						<a href="02-ProfilePage.html" class="author-thumb">
							<img src="<?=base_url().$kanInfo->kan_profile_photo?>" alt="<?=$kanInfo->kan_name;?>" style="width:124px; height:124px;">
						</a>
						<div class="author-content">
							<a class="h4 author-name"><?=$kanInfo->kan_name.' '.$kanInfo->kan_last_name;?></a>
							<div class="country"><?="کاندید ".$kanInfo->kan_typeOfkan.', '.$kanInfo->kan_province;?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<div class="h6 title">Video Gallery</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<?php
			$this->db->select('id,video');
			$this->db->where('kan_id',$_GET['id']);
			$this->db->from('post_video');
			$videos = $this->db->get()->result();
			foreach ($videos as $video):
		?>
		<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block video-item">
				<div class="video-player">
					<video  height="212" controls style="width:100%;">
					  <source src="<?=base_url().$video->video?>" type="video/mp4">
					</video>

					<a onclick="showModel(<?=$video->id;?>)" class="play-video">
						<svg class="olymp-play-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
					</a>
					<div class="overlay overlay-dark"></div>
					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></div>
				</div>
			</div>
		</div>

	<?php endforeach;?>
	</div>
</div>

<a class="back-to-top" href="#">
	<img src="<?=base_url();?>assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<div class="modal fade" id="open-photo-popup-v1" tabindex="-1" role="dialog" aria-labelledby="open-photo-popup-v1" aria-hidden="true">
	<div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1" role="document">
		<div class="modal-content">
			<a href="<?=base_url()?>index.php/kandidController/video?id=<?=$_GET['id'];?>" class="close icon-close">
				<svg class="olymp-close-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<center>
			<div class="modal-body">
				<div class="open-photo-thumb">
					<video width="400" height="400" id="video" controls></video>
				</div>
			</div>
			</center>
		</div>
	</div>
</div>


<script>

function showModel(id){
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/kandidController/getVideos/"+id,
            dataType: "JSON",
            success: function(data) {
            	var srcType = "video/mp4";
                $('#video').html('<source src="'+data['video']+'" type="'+srcType+'"></source>');
            	$('#open-photo-popup-v1').modal('show');
            },
            error: function(err) {
            	consoel.log(err);
            }
        });
    }
</script>