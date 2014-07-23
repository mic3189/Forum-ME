<!DOCTYPE html>
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <title><?php echo $title_for_layout; ?></title>
  <?php
    echo $this->Html->meta('icon');
 
    echo $this->Html->css('bootstrap.min.css');
    echo $this->Html->css('custom.css');
 
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
   
  <style>
    body {
      padding-top: 70px;
    }
  </style>
</head>
<body>
  <?php echo $this->element('navigation');?>
  
  <div class="container">
    <?php echo $this->Session->flash(); ?>
 
    <?php echo $this->fetch('content'); ?>
     
    <hr>
    <div class="footer">
   		<p><?php echo Configure::read('my.site_name'); ?> &copy; 2014</p>
  	</div><!-- /footer -->
  </div> <!-- /container -->
   
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <?php echo $this->Html->script('bootstrap.min'); ?>
</body>
</html>
