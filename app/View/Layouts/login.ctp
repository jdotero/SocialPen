<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('favicon.ico');

		echo $this->Html->css('index');
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
	<body>			
			<div id="index">	
		<?php echo $this->Html->image('login_pen.png',array('class'=>'imagen')); ?>	
			<div id="Formulario_login">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			
			</div>
		</div>
	</body>
</html>
