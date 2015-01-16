<?php $this->assign('title', 'SocialPen'); ?>

<?php echo $this->Session->flash('auth'); ?>
<form action="/" id="UserLoginForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>    <fieldset>       
        <div class="input text">
        <label for="UserUsername"><?php echo __('Nombre Usuario'); ?></label>
        <input name="data[User][username]" maxlength="127" type="text" value="twert" id="UserUsername" required="required"></div>
        <div class="input password"><label for="UserPassword"><?php echo __('Password'); ?></label>
        <input name="data[User][password]" type="password" value="wert" id="UserPassword" required="required"></div>
</fieldset>
<div class="btn-login"><button type="submit" class="btn btn-success"><?php echo __('Login'); ?></button> <a class="btn-register btn btn-primary btn-md"href="/users/add"><?php echo __('Registrarse'); ?></a></div></form>
