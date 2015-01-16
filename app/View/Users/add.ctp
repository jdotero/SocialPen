<?php $this->assign('title', 'SocialPen'); ?>
<form action="/users/add" id="UserAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>	<fieldset>
		<legend><?php echo __('Registro de usuario');?></legend>
			<div class="input text">
				<label for="UserUsername"><?php echo __('Nombre Usuario'); ?></label>
				<input name="data[User][username]" maxlength="127" type="text" id="UserUsername" required="required">
			</div>
			<div class="input password">
				<label for="UserPassword"><?php echo __('Contraseña'); ?></label>
				<input name="data[User][password]" type="password" id="UserPassword" required="required">
			</div>
			<div class="input text">
				<label for="UserName"><?php echo __('Nombre Completo'); ?></label>
				<input name="data[User][name]" maxlength="255" type="text" id="UserName" required="required">
			</div>
	</fieldset>
	<div class="submit"><input type="submit" value="Submit"> </div>
</form>



				
			
