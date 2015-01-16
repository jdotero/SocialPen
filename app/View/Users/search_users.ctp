<?php $this->assign('user_name', $name); ?>
<?php $this->start('menu');?>

<li><a href="/posts">Muro</a></li>
<li><a href="/friends">Amigos</span></a></li>
<li><a href="/requests">Solicitudes de amistad</a></li>
<?php $this->end(); ?>
<div class="tabla" >
                <table >
                    <tr>
                        <td>
                            <?php echo __('Alias'); ?>
                        </td>
                        <td >
                            <?php echo __('Nombre'); ?>
                        </td>
                        <td>
                            <?php echo __('Acciones'); ?>
                        </td>
                    </tr>
                    <?php/* debug($friends);
                    die(); */?>
                   	<?php foreach ($users as $user): ?>
                   	<?php if($user['User']['id']!=$currentid){ ?>	
					<tr>
						<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
						<td class="actions">
							<?php 
								/*peticiones estan las peticiones activas
								es un array con solicitado y id de peticion*/
								if(isset($peticiones[$user['User']['id']])){
									echo $this->Form->postLink(__('Cancelar Peticion'), array(
                                     'controller' => 'requests','action' => 'delete', $peticiones[$user['User']['id']]), array('class'=>'btn btn-sm btn-warning'), __('¿Seguro que quieres cancelar la peticion?'));
								}else if(!in_array($user['User']['id'], $amigos)){ ?>
										<form action="/requests/add" method="post">
											<input type="hidden" name="data[Request][user_id]" <?php echo "value=".$currentid; ?> />
											<input type="hidden" name="data[Request][friend]" <?php echo "value=".$user['User']['id']; ?> />
											<input type="submit" class="btn btn-success btn-sm" value="Solicitar Amistad"/>

										</form>
								  <?php	
								  }else{

							  		 echo $this->Form->postLink(__('Borrar Amistad'), array('controller' => 'friends','action'=> 'delete', $user['User']['id']), array('class'=>'btn btn-danger btn-sm'), __('Estas seguro de que quieres borrar la amistad con %s?', $user['User']['name']));
								  }	

							 }?>
					</tr>
					<?php endforeach; ?>
                </table>

</div>
