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
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">Photo Gallery</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="photo-page" role="tabpanel">
					<div class="photo-album-wrapper">	
						<?php
							$this->db->select('id,image');
							$this->db->where('kan_id',$_GET['id']);
							$this->db->from('post_image');
							$images = $this->db->get()->result();
							foreach ($images as $image):
						?>
						<div class="photo-item col-4-width">
							<img src="<?=base_url().$image->image;?>" alt="photo" style="width:100%; height:250px;">
							<div class="overlay overlay-dark"></div>
						
							<a class="full-block" onclick="showModel(<?=$image->id?>)"></a>
						</div>
						<?php endforeach;?>
						<a href="#" class="btn btn-control btn-more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<a class="back-to-top" href="#">
	<img src="<?=base_url();?>assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<div class="modal fade" id="open-photo-popup-v1" tabindex="-1" role="dialog" aria-labelledby="open-photo-popup-v1" aria-hidden="true">
	<div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<div class="open-photo-thumb">
					<div class="swiper-container" data-slide="fade">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="photo-item">
									<center>
									<img id="img" src="<?=base_url()?>assets/img/open-photo1.jpg" alt="photo" style="height:400px;">
									<div class="overlay"></div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
function showModel(id){
        $.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/kandidController/getImages/"+id,
            dataType: "JSON",
            success: function(data) {
            	$('#open-photo-popup-v1').modal('show');
                $('#img').attr('src',data['image']);
            },
            error: function(err) {
            }
        });
    }
</script>