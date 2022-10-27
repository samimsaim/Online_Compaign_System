<?php
    function calculate_time_span($date){
        $seconds = strtotime(date("Y-m-d h:i:s a")) - strtotime($date);
        $months = floor($seconds/(3600*24*30));
        $day = floor($seconds/(3600*24));
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours*3600))/60);
        $secs = floor($seconds%60);
        if($seconds < 60)
            $time = $secs." seconds ago";
        else if($seconds < 60*60)
            $time = $mins." minute ago";
        else if($seconds < 24*60*60)
            $time = $hours." hours ago";
        else if($seconds < 24*60*60)
            $time = $day." day ago";
        else{
            $time = $months." month ago";
            $time = date('F',strtotime($date)).' '.date('d',strtotime($date)).' at '.date('h:i a',strtotime($date));
        }
        return $time;
    }
?>
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

<!-- ... end Top Header-Profile -->
<div class="container">
	<div class="row">
		<!-- Main Content -->
		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">
				<?php
					foreach ($posts as $row):
				?>
				<div class="ui-block">
					<!-- Post -->
					<article class="hentry post">
							<div class="post__author author vcard inline-items">
								<img src="<?=base_url().$kanInfo->kan_profile_photo;?>" alt="author">
								<div class="author-date">
									<a class="h6 post__author-name fn" href="<?=base_url()?>index.php/indexController/kandidProfile?id=<?=$_GET['id'];?>"><?=$kanInfo->kan_name.' '.$kanInfo->kan_last_name;?></a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											<?=calculate_time_span($row->create_at);?>
										</time>
									</div>
								</div>
					
								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="http://localhost:88/kandid/admin/">Edit Post</a>
										</li>
										<li>
											<a href="http://localhost:88/kandid/admin/">Delete Post</a>
										</li>
									</ul>
								</div>
					
							</div>
							<?php if(!empty($row->post_details) || $row->post_details != null):?>
							<!-- if has text  -->
							<p style="text-align:right; font-family: Serif; font-size:18px;"><?=$row->post_details;?></p>
						<?php endif;
							$this->db->select("image");
							$this->db->where('post_id',$row->post_id);
							$this->db->from("post_image");
							$file = $this->db->get()->result();
							$files = array();
							$x = 0;
							foreach ($file as $value) {
								$files[$x++] = $value->image;
							}
							if(count($files) >0):
							?>
							<?php if(count($files) == 1):?>
							<!-- if has one image -->
							<div class="post-thumb">
								<img src="<?=base_url().$files[0];?>" alt="photo" style="height:348px;">
							</div>
							<?php
								endif;
								if(count($files) == 2):
							?>
							<!-- if has two image -->
							<div class="post-block-photo js-zoom-gallery">
								<a href="<?=base_url().$files[0];?>" class="half-width"><img src="<?=base_url().$files[0];?>" alt="photo" style="height:340px;"></a>
								<a href="<?=base_url().$files[1];?>" class="half-width"><img src="<?=base_url().$files[1];?>" alt="photo" style="height:340px;"></a>
							</div>
							<?php
								endif;
								if(count($files) == 3):
							?>
							<!-- if has three image -->
							<div class="post-block-photo js-zoom-gallery">
								<a href="<?=base_url().$files[0];?>" class="full-width" style="width:100%;"><img src="<?=base_url().$files[0];?>" alt="photo" style="height:300px;"></a>
								<a href="<?=base_url().$files[1];?>" class="half-width"><img src="<?=base_url().$files[1];?>" alt="photo" style="height:180px;"></a>
								<a href="<?=base_url().$files[2];?>" class="half-width"><img src="<?=base_url().$files[2];?>" alt="photo" style="height:180px;"></a>	
							</div>
							<?php
								endif;
								if(count($files) == 4):
							?>
							<!-- if has four image -->
							<div class="post-block-photo js-zoom-gallery">
								<a href="<?=base_url().$files[0];?>" style="width:100%;"><img src="<?=base_url().$files[0];?>" alt="photo" style="height:300px;"></a>
								<a href="<?=base_url().$files[1];?>" class="col-3-width" style="height:180px;"><img src="<?=base_url().$files[1];?>" alt="photo" style="height:180px;"></a>
								<a href="<?=base_url().$files[2];?>" class="col-3-width" style="height:180px;"><img src="<?=base_url().$files[2];?>" alt="photo" style="height:180px;"></a>
								<a href="<?=base_url().$files[3];?>" class="col-3-width" style="height:180px;"><img src="<?=base_url().$files[3];?>" alt="photo" style="height:180px;"></a>
							</div>
						<?php endif; endif;
							$this->db->select("video");
							$this->db->where('post_id',$row->post_id);
							$this->db->from("post_video");
							$video = $this->db->get()->result();
							$videos = array();
							$y = 0;
							foreach ($video as $video) {
								$videos[$y++] = $video->video;
							}
							if(count($videos) > 0):
							?>
							<!-- if has video -->
							<div class="post-thumb">
								<video controls style="width:100%; height:348px;">
								  	<source src="<?=base_url().$videos[0];?>" type="video/mp4">
								</video>
							</div>
						<?php endif;?>
						<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'people'):?>
						<div class="post-additional-info inline-items">
							<?php
								$this->db->where('post_id',$row->post_id);
								$this->db->from('like');
								$likeCount = $this->db->count_all_results();
								$this->db->where('post_id',$row->post_id);
								$this->db->where('person_id',$_SESSION['user_id']);
								$this->db->from('like');
								$like = $this->db->count_all_results();
							?>
							<a onclick="insertLike(<?=$row->post_id;?>)" class="post-add-icon inline-items">
								<img id="likeImg_<?=$row->post_id;?>" src="<?=base_url();?>../assets/global/img/<?php if($like == 0) echo 'like.png'; else echo 'hearts.png';?>" style="height: 20px;">
								<span id="likeCount_<?=$row->post_id;?>"><?=$likeCount;?></span>
							</a>
				
							<div class="names-people-likes">
								<?php if($like !=0 && $likeCount >1):?>
								<span style="font-weight:bold;">You</span> and
								<br><?=$likeCount-1;?> more liked this
							<?php endif;?>
							</div>
				
							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items" data-toggle="collapse" data-target="#col_<?=$row->post_id;?>">
									<svg class="olymp-speech-balloon-icon">
										<use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
									</svg>
									<?php
										$this->db->where('post_id',$row->post_id);
										$this->db->from('comment');
										$commentCount = $this->db->count_all_results();
									?>
									<span id="commentCount_<?=$row->post_id;?>"><?=$commentCount;?></span>
								</a>
				
							</div>
						</div>
					<?php endif;?>
					</article>
					<div class="collapse" id="col_<?=$row->post_id;?>">
						<?php
							$this->db->where('post_id',$row->post_id);
							$this->db->from('comment');
							$this->db->order_by('create_at','ASC');
							$commentList = $this->db->get()->result();
							foreach ($commentList as $comList):
						?>
					<article class="hentry post">
					    <ul class="comments-list">
							<li>
								<?php
									$this->db->where('po_id',$comList->po_id);
									$this->db->from('poeple');
									$peopleInfo = $this->db->get()->result();
									foreach ($peopleInfo as $poInfo ) {}
								?>
								<div class="post__author author vcard inline-items">
									<img src="<?=base_url().$poInfo->po_photo;?>" alt="author">
									<div class="author-date">
										<a class="h6 post__author-name fn" href=""><?=ucfirst($poInfo->po_name).' '.ucfirst($poInfo->po_last_name);?></a>
										<div class="post__date">
											<time class="published" datetime="2017-03-24T18:18">
												<?=calculate_time_span($comList->create_at);?>
											</time>
										</div>
									</div>

									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>../assets/icons/icons.svg#olymp-three-dots-icon"></use></svg></a>

								</div>

								<p><?=$comList->com_mark;?></p>
							</li>
						</ul>
					</article>
					<?php endforeach;?>
					</div>		
					<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'people'):?>
						<form id="comment_form_<?=$row->post_id;?>" method="POST" class="comment-form inline-items">
							<div class="post__author author vcard inline-items">
								<img src="<?=base_url();?>assets/img/author-page.jpg" alt="author">
								<div class="form-group with-icon-right ">
									<textarea name="comment_<?=$row->post_id;?>" id="comment_<?=$row->post_id;?>" class="form-control" placeholder=""></textarea>
								</div>
							</div>
							<input type="hidden" name="post_id" id="post_id" value="<?=$row->post_id;?>" />
							<input type="hidden" name="people_id" id="people_id" value="<?=$_SESSION['user_id'];?>" />
							<button type="submit" onclick="insertComment(<?=$row->post_id;?>)" name="submit" id="submit" class="btn btn-md-2 btn-primary">Post Comment</button>
							<button type="reset" class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
						</form>
					<?php endif;?>

					<!-- .. end Post -->	
				</div>

				<?php endforeach;?>
			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
				</svg>
			</a>
		</div>
		<!-- ... end Main Content -->
		<!-- Left Sidebar -->
		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Profile Intro</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Personal-Info -->
					
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">About Me:</span>
							<span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the  “Daydreams” Agency in Pier 56.</span>
						</li>
						<li>
							<span class="title">Favourite TV Shows:</span>
							<span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
						</li>
						<li>
							<span class="title">Favourite Music Bands / Artists:</span>
							<span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>
						</li>
					</ul>
					
					<!-- .. end W-Personal-Info -->
					<!-- W-Socials -->
					
					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a href="#" class="social-item bg-facebook">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
							Facebook
						</a>
						<a href="#" class="social-item bg-twitter">
							<i class="fab fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						<a href="#" class="social-item bg-dribbble">
							<i class="fab fa-dribbble" aria-hidden="true"></i>
							Dribbble
						</a>
					</div>
					
					
					<!-- ... end W-Socials -->
				</div>
			</div>
			<?php if(isset($_SESSION['level']) && $_SESSION['level'] == 'people'):?>
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Following</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Badges -->
					
					<ul class="widget w-badges">
						<?php
							$this->db->where('people_id',$_SESSION['user_id']);
							$this->db->from('follower');
							$followingList = $this->db->get()->result();
							$idlist = array();
							$x = 0;
							foreach ($followingList as $following){
								$idlist[$x++] = $following->kan_id;
							}
							if(!empty($idlist)){
							$this->db->select('kan_id,kan_profile_photo');
							$this->db->where_in('kan_id',$idlist);
							$this->db->from('kandid');
							$kandidList = $this->db->get()->result();
							foreach ($kandidList as $list):?>
							<li>
								<a class="author-thumb" href="<=base_url()>index.php/indexController/kndidProfile?id=<?=$list->kan_id?>">
									<img src="<?=base_url().$list->kan_profile_photo?>" alt="author" style="width:36px; height:36px;">
								</a>
							</li>
					<?php endforeach; }?>
					</ul> 
					
					<!--.. end W-Badges -->
				</div>
			</div>
		<?php endif;?>
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Last Videos</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Latest-Video -->
					<?php
						$this->db->select("post_id");
						$this->db->from("post");
						$this->db->where("kan_id",$kanInfo->kan_id);
						$posts = $this->db->get()->result();
						$arr = array();
						$x = 0;
						foreach ($posts as $key ) {
							$arr[$x++] = $key->post_id;
						}
						$videos = array();
						if(!empty($arr)){
							$this->db->select("*");
							$this->db->from("post_video");
							$this->db->where_in("post_id",$arr);
							$videos = $this->db->get()->result();
						}
					?>
					
					<ul class="widget">
						<?php foreach ($videos as $video): ?>
						<li>
							<video  height="212" controls style="width:100%;">
							  <source src="<?=base_url().$video->video?>" type="video/mp4">
							</video>							
						</li>
					<?php endforeach;?>
					</ul>
					<!-- .. end W-Latest-Video -->
				</div>
			</div>
		</div>
		<!-- ... end Left Sidebar -->
		<!-- Right Sidebar -->
		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
			<?php
				$images = array();
				if(!empty($arr)){
					$this->db->select("*");
					$this->db->from("post_image");
					$this->db->where_in("post_id",$arr);
					$this->db->order_by("created_at","asc");
					$this->db->limit(9);
					$images = $this->db->get()->result();
				}
			?>
				<div class="ui-block-title">
					<h6 class="title">Last Photos</h6>
				</div>
				<div class="ui-block-content">

					<!-- W-Latest-Photo -->
					
					<ul class="widget w-last-photo js-zoom-gallery">
						<?php foreach ($images as $image): ?>
						<li>
							<a href="<?=base_url().$image->image;?>">
								<img src="<?=base_url().$image->image;?>" alt="photo" style="width:65px; height:65px;">
							</a>
						</li>
					<?php endforeach;?>
					</ul>
					
					
					<!-- .. end W-Latest-Photo -->
				</div>
			</div>

			<div class="ui-block">
			 <?php
				$this->db->select("kan_id");
		        $this->db->from("kandid");
		        $famousKandidCount = $this->db->get()->num_rows();	
		        
		        $this->db->select("kan_id,kan_profile_photo");
		        $this->db->from("kandid");
		        $famousKandid = $this->db->get()->result();
		    ?>
				<div class="ui-block-title">
					<h6 class="title">Famous Candidate (<?=$famousKandidCount;?>)</h6>
					<a class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					
					<!-- W-Faved-Page -->
					
					<ul class="widget w-faved-page">
						<?php foreach($famousKandid as $row):?>
						<li>
							<a href="<?=base_url()?>index.php/indexController/kandidProfile?id=<?=$row->kan_id;?>">
								<img src="<?=base_url().$row->kan_profile_photo;?>" style="width:36px; height:36px;">
							</a>
						</li>
					<?php endforeach;
						if($famousKandidCount >20):?>
							<li class="all-users">
								<a>+<?= $famousKandidCount-19;?></a>
							</li>
						<?php endif;?>
					</ul>
					
					<!-- ... end W-Faved-Page -->				</div>
			</div>
		</div>
		<!-- ... end Right Sidebar -->
	</div>
</div>
<!-- Window-popup Update Header Photo -->
<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update Header Photo</h6>
			</div>

			<div class="modal-body">
				<a href="#" class="upload-photo-item">
				<svg class="olymp-computer-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>

				<h6>Upload Photo</h6>
				<span>Browse your computer.</span>
			</a>

				<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Choose from My Photos</h6>
			<span>Choose from your uploaded photos</span>
		</a>
			</div>
		</div>
	</div>
</div>
<!-- ... end Window-popup Update Header Photo -->
<a class="back-to-top" href="#">
	<img src="<?=base_url();?>assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<script type="text/javascript">
	
	function insertComment(post_id){
		$('#comment_form_'+post_id).on('submit',function(event){
			event.preventDefault();
			var from_data = $(this).serialize();
			$.ajax({
				url: "<?=base_url();?>index.php/indexController/insertComment",
		        type: "POST",
		        data: from_data,
		        dataType: "JSON",
			        success: function(data) {
			            if(data['msg'] == 'yes'){
			           		$('#commentCount_'+post_id).text(data['commentCount']);
			           		$('#comment_form_'+post_id)[0].reset();
			            }
			        },
			        error: function(err) {
			        }
		    });	
		});
	}

	function insertLike(post_id){	
		var imgFill = "<?=base_url()?>"+'../assets/global/img/hearts.png';
		var imgEmpty = "<?=base_url()?>"+'../assets/global/img/like.png';
		$.ajax({
			url: "<?=base_url();?>index.php/indexController/insertLike",
	        type: "POST",
	        data: {postID:post_id},
	        dataType: "JSON",
		        success: function(data) {
		            if(data['msg'] == 'yes'){
		            	$('#likeImg_'+post_id).attr('src',imgFill);
		           		$('#likeCount_'+post_id).text(data['likeCount']);
		            }else if(data['msg'] == 'no'){
		            	$('#likeImg_'+post_id).attr('src',imgEmpty);
		            	$('#likeCount_'+post_id).text(data['likeCount']);
		            }
		        },
		        error: function(err) {
		        }
	    });	
	}
</script>