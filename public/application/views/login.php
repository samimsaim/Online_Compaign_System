<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item active">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="<?=base_url()?>assets/svg-icons/sprites/icons.svg#olymp-login-icon"></use></svg>
						</a>
					</li>
				</ul>
			
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Login</div>
						<form class="content" method="post" action="<?=base_url()?>index.php/indexController/checkLogin">
							<div class="row">
								<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="form-group label-floating is-empty">
										<label class="control-label">Username or Email</label>
										<input class="form-control" placeholder="" name="email">
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Your Password</label>
										<input class="form-control" placeholder="" type="password" name="password">
									</div>
			
									<div class="remember">
			
										<div class="checkbox">
											<label>
												<input name="isKandid" type="checkbox">
												Is it Condiddate?
											</label>
										</div>
										<a href="#" class="forgot">Forgot my Password</a>
									</div>
			
									<input type="submit" class="btn btn-lg btn-primary full-width" name="login" value="Login"/>
			
									<p>Don’t you have an account? <a href="<?=base_url()?>index.php/indexController/addPeople">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	