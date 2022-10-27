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
					<div class="h6 title">List of Follower</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12">
		<?php
			$this->db->where('kan_id',$_GET['id']);
			$this->db->from('follower');
			$follower = $this->db->get()->result();
			foreach ($follower as $follow):
		?>
			<div class="photo-album-item-wrap col-4-width" >
				<div class="photo-album-item" data-mh="album-item">
					<?php
						$this->db->where('po_id',$follow->people_id);
						$this->db->from('poeple');
						$result = $this->db->get()->result();
						foreach ($result as $key) {}
					?>
					<div class="photo-item">
						<img src="<?=base_url().$key->po_photo?>" alt="photo" style="width:100%; height:284px;">
					</div>
					<div class="content">
						<a href="#" class="title h5"><?=$key->po_name.' '.$key->po_last_name;?></a>
						<span class="sub-title"><?=$follow->created_at;?></span>
						<div class="swiper-container">
							<div class="swiper-wrapper">				
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<?php
												$this->db->where('people_id',$follow->people_id);
												$this->db->from('follower');
												$followCount = $this->db->count_all_results();
											?>
											<div class="h6"><?=$followCount;?></div>
											<div class="title">Following</div>
										</a>
										<?php
											$this->db->select('post_id');
											$this->db->where('kan_id',$_GET['id']);
											$this->db->from('post');
											$res = $this->db->get()->result();
											$ids = array();
											$x = 0;
											foreach ($res as $row) {
												$ids[$x++] = $row->post_id;
											}
											if(count($ids) >0){
												$this->db->where('person_id',$follow->people_id);
												$this->db->where_in('post_id',$ids);
												$this->db->from('like');
												$like = $this->db->count_all_results();

												$this->db->where('po_id',$follow->people_id);
												$this->db->where_in('post_id',$ids);
												$this->db->from('comment');
												$comment = $this->db->count_all_results();
											}else{
												$like = $comment = 0;
											}

										?>

										<a href="#" class="friend-count-item">
											<div class="h6"><?=$like?></div>
											<div class="title">Likes</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6"><?=$comment;?></div>
											<div class="title">Comments</div>
										</a>
									</div>
								</div>
							</div>
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>