<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $components = array('Paginator');


	public function index() {
		$this->layout='wall';
		/*prueba*/
		$CurrentUser=$this->Auth->user();
		$this->set('user',$CurrentUser['username']);
		$this->Paginator->settings=array('conditions' => array('user_id' => $this->requestAction('/friends/getFriends/'.$CurrentUser['id'])),
										'order'=>array('fecha_creacion'=>'desc'));
		$likes=$this->requestAction('/likes/getLikes');
		$this->set('likes',$likes);
		$this->Post->recursive = 0;
       	$this->set('posts', $this->Paginator->paginate());
	}


	
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			//Verifica si el usuario esta logeado para insertar post
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			
			if ($this->Post->save($this->request->data)) {
				if($this->Post->saveField('fecha_creacion', date("Y-m-d H:i:s"))){
						$this->Session->setFlash(__('Post publicado correctamente!!!'), 'default', array('class' => 'bg-primary'));



				return $this->redirect(array('action' => 'index'));}
			}
		}
		$this->redirect(array('action'=>'index'));
	}


/*En caso de implementar la funcion de borrar post
*con un boton de formulario post e id del post a borrar ya 
*nos borraria el post.
*el metodo auth verifica si el post es del usuario.*/
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Post incorrecto'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('El post ha sido borrado'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
    //si tengo id de user puedo hacerlo
	if($user['id']!=null){
		return true;
	}
    return false;
    }




}
