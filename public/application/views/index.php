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
<div class="container">
	<div class="row">
		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-sm-12 col-12">

			<div class="page-description">
				<div class="icon">
					<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
				</div>
				<span>Here you’ll see the recent updates of your Fav Pages</span>
			</div>
			<div id="newsfeed-items-grid">
				<?php
					foreach ($posts as $row):
				?>
				<div class="ui-block">
					<!-- Post -->
					<article class="hentry post">
						<?php
							$this->db->where('kan_id',$row->kan_id);
							$this->db->from('kandid');
							$kanInfos = $this->db->get()->result();
							foreach ($kanInfos as $kanInfo) {}
						?>
							<div class="post__author author vcard inline-items">
								<img src="<?=base_url().$kanInfo->kan_profile_photo;?>" alt="author">
								<div class="author-date">
									<a class="h6 post__author-name fn" href="<?=base_url()?>index.php/indexController/kandidProfile?id=<?=$kanInfo->kan_id;?>"><?=$kanInfo->kan_name.' '.$kanInfo->kan_last_name;?></a>
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


			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>

		</div>

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
			<!-- Start weather  -->
				<div class="ui-block">
				<!-- W-Weather -->
				
				<div class="widget w-wethear">
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				
					<div class="wethear-now inline-items">
						<div class="temperature-sensor">64°</div>
						<div class="max-min-temperature">
							<span>58°</span>
							<span>76°</span>
						</div>
				
						<svg class="olymp-weather-partly-sunny-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon"></use></svg>
					</div>
				
					<div class="wethear-now-description">
						<div class="climate">Partly Sunny</div>
						<span>Real Feel: <span>67°</span></span>
						<span>Chance of Rain: <span>49%</span></span>
					</div>
				
					<ul class="weekly-forecast">
				
						<li>
							<div class="day">sun</div>
							<svg class="olymp-weather-sunny-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-sunny-icon"></use></svg>
				
							<div class="temperature-sensor-day">60°</div>
						</li>
				
						<li>
							<div class="day">mon</div>
							<svg class="olymp-weather-partly-sunny-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon"></use></svg>
							<div class="temperature-sensor-day">58°</div>
						</li>
				
						<li>
							<div class="day">tue</div>
							<svg class="olymp-weather-cloudy-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-cloudy-icon"></use></svg>
				
							<div class="temperature-sensor-day">67°</div>
						</li>
				
						<li>
							<div class="day">wed</div>
							<svg class="olymp-weather-rain-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-rain-icon"></use></svg>
				
							<div class="temperature-sensor-day">70°</div>
						</li>
				
						<li>
							<div class="day">thu</div>
							<svg class="olymp-weather-storm-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-storm-icon"></use></svg>
				
							<div class="temperature-sensor-day">58°</div>
						</li>
				
						<li>
							<div class="day">fri</div>
							<svg class="olymp-weather-snow-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-snow-icon"></use></svg>
				
							<div class="temperature-sensor-day">68°</div>
						</li>
				
						<li>
							<div class="day">sat</div>
				
							<svg class="olymp-weather-wind-icon-header"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons-weather.svg#olymp-weather-wind-icon-header"></use></svg>
				
							<div class="temperature-sensor-day">65°</div>
						</li>
				
					</ul>
				
					<div class="date-and-place">
						<h5 class="date">Saturday, March 26th</h5>
						<div class="place">San Francisco, CA</div>
					</div>
				
				</div>
				
				<!-- W-Weather -->
			</div>

			<!-- End weather -->

			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">List of province</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<!-- W-Action -->
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<?php
						$this->db->distinct();
						$this->db->select('kan_province');
						$this->db->from('kandid');
						$provs = $this->db->get()->result();
						foreach ($provs as $prov):
					?>
					<li class="inline-items">
						<div class="author-thumb">
							<div style="width:37px; height:37px; background-color:red; border-radius:20px;"><center style="font-weight:bold; padding-top:3px; color:#fff; font-size:19px;">K</center></div>
						</div>
						<div class="notification-event" style="margin-top:11px;">
							<a href="<?=base_url()?>index.php/kandidController/provicne?province=<?=$prov->kan_province;?>" class="h6 notification-friend"><?=$prov->kan_province;?></a>
						</div>
						<?php 
							$this->db->where('kan_province',$prov->kan_province);
							$this->db->from('kandid');
							$provCount = $this->db->count_all_results();
						?>
						<span class="notification-icon">
							<a href="<?=base_url()?>index.php/kandidController/provicne?province=<?=$prov->kan_province;?>"class="accept-request">
								<span class="without-text" style="font-size:20px;"><?=$provCount;?></span>
							</a>
						</span>
					</li>
				<?php endforeach;?>
				</ul>
				<!-- ... end W-Action -->
			</div>

		</div>

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">


			<div class="ui-block">
				
				<!-- W-Create-Fav-Page -->
				
				<div class="widget w-create-fav-page">
					<div class="icons-block">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
				
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>
				
					<div class="content">
						<span>Be like them and</span>
						<h3 class="title">Create your own Favourite Page!</h3>
						<a href="http://localhost:88/kandid/admin/" class="btn btn-bg-secondary btn-sm">Start Now!</a>
					</div>
				</div>
				
				<!-- ... end W-Create-Fav-Page -->			</div>

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

<!-- Window-popup Choose from my Photo -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
	<div class="modal-dialog window-popup choose-from-my-photo" role="document">

		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Choose from My Photos</h6>

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
							<svg class="olymp-photos-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
							<svg class="olymp-albums-icon"><use xlink:href="<?=base_url();?>assets/svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>
						</a>
					</li>
				</ul>
			</div>

			<div class="modal-body">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo1.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo2.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo3.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo4.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo5.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo6.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo7.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo8.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="<?=base_url();?>assets/img/choose-photo9.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>

					</div>
					<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo10.jpg" alt="photo">
								<figcaption>
									<a href="#">South America Vacations</a>
									<span>Last Added: 2 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="<?=base_url();?>assets/img/choose-photo11.jpg" alt="photo">
								<figcaption>
									<a href="#">Photoshoot Summer 2016</a>
									<span>Last Added: 5 weeks ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="<?=base_url();?>assets/img/choose-photo12.jpg" alt="photo">
								<figcaption>
									<a href="#">Amazing Street Food</a>
									<span>Last Added: 6 mins ago</span>
								</figcaption>
							</figure>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="<?=base_url();?>assets/img/choose-photo13.jpg" alt="photo">
								<figcaption>
									<a href="#">Graffity & Street Art</a>
									<span>Last Added: 16 hours ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="<?=base_url();?>assets/img/choose-photo14.jpg" alt="photo">
								<figcaption>
									<a href="#">Amazing Landscapes</a>
									<span>Last Added: 13 mins ago</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="<?=base_url();?>assets/img/choose-photo15.jpg" alt="photo">
								<figcaption>
									<a href="#">The Majestic Canyon</a>
									<span>Last Added: 57 mins ago</span>
								</figcaption>
							</figure>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
						<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... end Window-popup Choose from my Photo -->


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