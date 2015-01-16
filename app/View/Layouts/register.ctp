<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('favicon');

		echo $this->Html->css('registrar');
		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="registrar">			
		<?php echo $this->Html->image('signin_pen.png', array('class'=>'imagen',
																'url'=>'/')); ?>
			
		
		
		<div id="logo">
			
			<?php echo $this->Html->image('logo.png',array('url'=>'/')); ?>
		</div>
		
		<div id="Formulario_registro">
				
				<?php echo $this->fetch('content'); ?>
					
			</div>
		
		</div>
		</div>

</body>
</html>
