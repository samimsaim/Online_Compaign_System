<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-login-icon"></use></svg>
						</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Contact Us</div>
						<form class="content" method="post" enctype="multipart/form-data" action="<?=base_url()?>index.php/kandidController/contactUs">
							<div class="row">
								<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">First Name</label>
										<input class="form-control" placeholder="" type="text" name="first_name">
									</div>
								</div>
								<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Last Name</label>
										<input class="form-control" placeholder="" type="text" name="last_name">
									</div>
								</div>
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Email</label>
										<input class="form-control" placeholder="" type="email" name="email">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Message</label>
										<textarea class="form-control" name="message"></textarea>
									</div>			
									
									<input type="submit" name="contact" class="btn btn-purple btn-lg full-width" value="Send Message" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	