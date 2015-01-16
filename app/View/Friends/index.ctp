<?php $this->assign('user_name', $user); ?>
<?php $this->start('menu');?>

<li><a href="/posts/index"><?php echo __('Muro'); ?></a></li>
<li class="active"><a href="/friends"><?php echo __('Amigos'); ?><span class="sr-only">(current)</span></a></li>
<li><a href="/requests"><?php echo __('Solicitudes de amistad'); ?></a></li>
<?php $this->end(); ?>
<div class="tabla" >
                <table >
                    <tr>
                        <td>
                            Alias
                        </td>
                        <td >
                            Nombre
                        </td>
                        <td>
                            Acciones
                        </td>
                    </tr>
                    <?php foreach ($friends as $friend): ?>
					<tr>
						<td><?php echo h($friend['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($friend['User']['name']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Form->postLink(__('Borrar Amistad'), array('action' => 'delete', $friend['Friend']['id']), array('class'=>'btn btn-danger btn-sm'), __('Vas a borrar una amistad ¿Estas Seguro?')); ?>
						</td>
					</tr>
					<?php endforeach; ?>
                </table>

</div>
            