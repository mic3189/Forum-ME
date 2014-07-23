<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
		<h2>Login</h2>
		<div class="well">
   		<?php echo $this->Session->flash(); ?>
   		<?php echo $this->Form->create('User', array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false)));?>
			 	<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <?php echo $this->Form->input('username',array('class'=>'form-control'));?>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <?php echo $this->Form->input('password',array('class'=>'form-control'));?>
			    </div>
			  </div>
				
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me">
						Remember me <a href="forgot"><?php echo __('Here if you have forgotten your password') ?></a>
					</label>
				</div>
			 
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <?php echo $this->Form->submit('Login',array('class'=>'btn btn-primary'))?>
			    </div>
			  </div>
			  Not yet a member. <?php echo $this->Html->link('Register Now!', array('controller'=>'users', 'action'=>'register')); ?>
			<?php echo $this->Form->end();?>
		</div>
	</div>
</div>