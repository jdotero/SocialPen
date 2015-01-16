<?php $this->assign('user_name', $user); ?>
<?php $this->start('menu');?>

<li class="active"><a href="#"><?php echo __('Muro'); ?><span class="sr-only">(current)</span></a></li>
<li><a href="/friends">Amigos</a></li>
<li><a href="/requests">Solicitudes de amistad</a></li>
<?php $this->end(); ?>

<div class="col-xs-12">
					<!-- fila de nuevo post -->
						<div class="row">
							<div class="boxPost container">
									<?php echo $this->Form->create('Post',array('action'=>'add')); ?>
											<fieldset>
											<?php
												echo $this->Form->input('contenido',array('class'=>'form-control','rows'=>'4',));
												echo $this->Form->hidden($this->Session->read('Auth.User.id'));
											?>
											</fieldset>
									<?php echo $this->Form->end(array('label' => __('Publicar'),'id' =>'send_button','class'=>array('btn','btn-danger')));?>
							</div>
						</div>
						



						<!-- posts existentes -->

						


		<?php foreach ($posts as $post): ?> 
<div class="row">
	<div class="boxPost container">
		<div class="main_post">
			<p class="author"><?php echo h($post['User']['name']); ?></p>
			<div class="post_box">
				<div class="post container-fluid">
					<p><?php echo h($post['Post']['contenido']); ?></p>
				</div>
				<div class="btnlike container-fluid">
					<form action="/likes/add" method="post" class="like_form">
						<input type="hidden" name="data[Like][user_id]" value=<?php echo $this->Session->read('Auth.User.id'); ?> />
						<input type="hidden" name="data[Like][post_id]" value=<?php echo $post['Post']['id']; ?> />
						<input type="image" src="/img/logo_like.png" class="like"/>
					</form>
					<p class="like">
					

					<?php
					
						if(array_key_exists($post['Post']['id'], $likes)){
							echo $likes[$post['Post']['id']];
						}else{
							echo 0;
						}

					?>
					</p>	
				</div>									
			</div>
		</div>
	</div>
</div>

<?php endforeach; ?>
</div>								

