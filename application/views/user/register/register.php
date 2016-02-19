<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
          <div class="panel panel-default" id="progress">
            <div class="panel-heading">SIGN UP
            </div>
            <div class="panel-body">  
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					 <button type="button" class="close" data-dismiss="alert">×</button>
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					 <button type="button" class="close" data-dismiss="alert">×</button>
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<legend>Already have a PostaNews iD? <a href="<?= base_url('login') ?>">Sign in.</a></legend>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username" required>
					<p class="help-block">At least 4 characters, letters or numbers only</p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
					<p class="help-block">A valid email address</p>
				</div>
			
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
			  </div></div></div>
	<div class="col-lg-6">
          <div class="panel panel-default" id="media-object">
            <div class="panel-heading">  About PostaNews ID
            </div>
            <div class="panel-body">
            <p></p>
            <div class="media">
              <a class="pull-left" href="<?= base_url('login') ?>">  <i class="fa fa-lg fa-user"></i>  </a>
              <div class="media-body">
                <h4 class="media-heading">Simple</h4>
                <p>Register quickly and easily to comment, add favourites, receive personalised recommendations based on your PostaNews browsing history and more…</p>
                <div class="media">
                  <a class="pull-left" href="#">    <i class="fa fa-lg fa-key"></i> </a>
                  <div class="media-body">
                    <h4 class="media-heading">Safe</h4>
                    <p>We store your information securely, and we never share it without your permission.

</p>
                  </div>
					<div class="media-body">
                    <h4 class="media-heading"><i class="fa fa-lg fa-send"></i>Spam-free</h4>
                    <p>We'll only send you emails if you ask for them.</p>
                  </div>
					<hr>
					<div class="media-body">
                    <h4 class="media-heading"><i class="fa fa-lg fa-lock"></i>Under 16?</h4>
                    <p>Please check with your parent or guardian that it's OK for you to register.</p>
                  </div>
                </div>
              </div>
            </div>
            </div>
			   </div>
            
	</div><!-- .row -->
		
</div><!-- .container -->