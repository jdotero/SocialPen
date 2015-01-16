<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('wall');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
	<body>
		<div class="main container-fluid">
						
					<!--Cabecera-->
			<div class="row">
						<div class="cabecera container">
						 <?php echo $this->Html->image('new_header.jpg', array('class' => array('logoCabecera', 'img-responsive'),
						 												 'url'=>array('controller'=>'posts', 'action'=>'index'))); ?>
						</div>
			</div>
			
			<!-- menu barra horizontal -->
			<div class="contenedor row">
				<div class="menu col-xs-12">
					 <nav class="navbar navbar-inverse" role="navigation">
						  <div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						     
						      <?php echo $this->Html->link(__('Bienvenido: '.$this->fetch('user_name')),
						      								'/posts/index',
						      								array('class'=>'navbar-brand')); ?>
						    </div>

						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      <ul class="nav navbar-nav">
						        <?php echo $this->fetch('menu'); ?>
						      </ul>
						      <form class="navbar-form navbar-left" role="search" action="/users/searchUsers" id="SearchUser" method="post">
						        <div class="form-group">
						          <input type="text" class="form-control" name="data[search][name]" placeholder="Introduce nombre" required>
						        </div>
						        <button type="submit" class="btn btn-default"><?php echo __('Buscar');?></button>
						      </form>
						      <ul class="nav navbar-nav navbar-right">
						        <li><a href="/users/logout"><?php echo __('Salir'); ?></a></li>
					          </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>


			<!-- cuerpo del sitio -->

			<div class="contenido row">
				
					<!-- fila de nuevo post -->
								<?php echo $this->Session->flash(); ?></p>
								<?php echo $this->fetch('content'); ?>
						
				
			</div>
			<!--footer-->
			<div class="footer row">
				<div class="relleno container">
					
				</div>
			</div>	
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</body>
</html>