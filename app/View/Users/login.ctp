<div class="row">
  <div class="col-lg-6 col-lg-offset-3">
		<h2></h2>
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
		<?php 
			$ses_user = $this->Session->read('User');
			$logout = $this->Session->read('logout');

			if(!$this->Session->check('User') && empty($ses_user)) { 
				echo $this->Html->image('facebook.png',array('id'=>'facebook','style'=>'cursor:pointer;float:left;'));
 			}else {
				echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';	
				echo '<a href="'.$logout.'">Logout</a>';		
			}
		?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
	  $('#facebook').click(function(e){
	    $.oauthpopup({
		    path: 'facebook_cps/login',
				width:600,
				height:300,
		    callback: function() {
		    	window.location.reload();
		    }
	    });
		e.preventDefault();
	  });
	});
</script>	