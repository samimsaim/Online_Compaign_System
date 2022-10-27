
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">Candidate No. (<?=count($kandid)?>)</div>
					<form class="w-search" method="post" action="<?=base_url()?>index.php/kandidController/search">
						<div class="form-group with-button">
							<input class="form-control" type="text" name="data" placeholder="Search Candidate...">
							<button type="submit" name="search">
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Friends -->

<div class="container">
	<div class="row">
		<?php foreach ($kandid as $row):?>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
			<div class="ui-block">
				<!-- Friend Item -->
				<div class="friend-item">
					<a href="<?=base_url();?>index.php/indexController/kandidProfile?id=<?=$row->kan_id;?>">
						<div class="friend-header-thumb">
							<img src="<?=base_url().$row->kan_cover;?>" alt="friend" style="width:318px; height:122px;">
						</div>
					</a>
					<div class="friend-item-content">
		
						<div class="friend-avatar">
						<a href="<?=base_url();?>index.php/indexController/kandidProfile?id=<?=$row->kan_id;?>">
							<div class="author-thumb">
								<img src="<?=base_url().$row->kan_profile_photo;?>" alt="author" style="width:92px; height:92px;">
							</div>
						</a>
							<div class="author-content">
								<a href="#" class="h5 author-name"><?=ucfirst($row->kan_name).' '.ucfirst($row->kan_last_name);?></a>
								<div class="country"><?='کاندید'.' '.$row->kan_typeOfkan.' '.$row->kan_province;?></div>
							</div>
						</div>
				
						<div class="swiper-container" data-slide="fade">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<?php
												$this->db->where('kan_id',$row->kan_id);
												$this->db->from('post_video');
												$video =$this->db->count_all_results();
												$this->db->where('kan_id',$row->kan_id);
												$this->db->from('post_image');
												$image =$this->db->count_all_results();
												$this->db->where('kan_id',$row->kan_id);
												$this->db->from('follower');
												$follow =$this->db->count_all_results();
											?>
											<div class="h6"><?=$follow;?></div>
											<div class="title">Follower</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6"><?=$image;?></div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6"><?=$video;?></div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
											<a href="<?=base_url();?>index.php/indexController/kandidProfile?id=<?=$row->kan_id;?>" class="btn btn-control bg-blue">
												<svg class="olymp-star-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
											</a>
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div>
							</div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
				
				<!-- ... end Friend Item -->			</div>
		</div>
	<?php endforeach;?>
	</div>
</div>

<a class="back-to-top" href="#">
	<img src="<?=base_url();?>assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>
