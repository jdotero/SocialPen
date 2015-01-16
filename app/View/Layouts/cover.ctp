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

		echo $this->Html->css('index');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php echo $this->fetch('prueba'); ?>
	<div id="index">
			
		<?php echo $this->Html->image('login_pen.png', array('class'=>'imagen')); ?>	
		<div id="Formulario_login">
				<form id="login" action= "#" method = "post">		
				Nombre usuario:<input id="boxuser" type="text" name="username" placeholder="Username"><br>
				<br>
				Contraseña:    <input id="boxpass" type="password" name="password" placeholder="Password"><br>
				<input class="boton" type="submit" value="Entrar">
				</form>
				<a href="#" class="olvido">Olvidaste tu password</a><br>
				<?php echo $this->Html->link(
				'Registrate aqui',
				'/users/signin',
				array('class'=>'olvido')); ?>
		
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
