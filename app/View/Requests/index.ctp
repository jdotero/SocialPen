<?php $this->assign('user_name', $user); ?>
<?php $this->start('menu');?>

<li><a href="/posts/index">Muro</a></li>
<li><a href="/friends">Amigos</a></li>
<li class="active"><a href="/requests">Solicitudes de amistad<span class="sr-only">(current)</span></a></li>
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
                    <?php/* debug($friends);
                    die(); */?>
                   	<?php foreach ($requests as $request): ?>
					<tr>
						<td><?php echo h($request['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($request['User']['name']); ?>&nbsp;</td>
						<td>
								<form action="/friends/add" method="post" style="display:inline">
												<input type="hidden" name="data[Friend][user_id]" <?php echo "value=".$request['Request']['user_id']; ?> />
												<input type="hidden" name="data[Friend][amigo]" <?php echo "value=".$request['Request']['friend']; ?> />
												<input type="hidden" name="data[Request][id]" <?php echo "value=".$request['Request']['id']; ?> />
												<input type="submit" value="Aceptar Solicitud" class="btn btn-success btn-sm"/>
								</form>
								<?php echo $this->Form->postLink(__('Denegar Solicitud'), array('action' => 'delete', $request['Request']['id']), array('class'=>'btn btn-danger btn-sm'), __('¿Seguro que quieres denegar la solicitud?')); ?>
		</td>
					</tr>
					<?php endforeach; ?>
                </table>

</div>

