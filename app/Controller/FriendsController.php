<?php
App::uses('AppController', 'Controller');

class FriendsController extends AppController {


	public $components = array('Paginator');


	public function index() {
		$this->layout='wall';
		$this->Friend->recursive = 0;
		$this->Paginator->settings=array('conditions' => array('amigo'=>$this->Auth->user()['id']));
		$this->set('friends', $this->Paginator->paginate());
		$this->set('user', $this->Auth->user()['username']);
	}	

	public function view($id = null) {
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
		$this->set('friend', $this->Friend->find('first', $options));
	}

	public function add() {
		/*Nos quedamos con el id de la peticion de amistad
		para eliminarla una vez sea añadida la amistad*/
		$requestid=$this->request->data['Request']['id'];
		if ($this->request->is('post')) {
			$this->Friend->create();

			/*almacenamos los datos para una doble insercion*/
			$userid=$this->request->data['Friend']['amigo'];
			$amigode=$this->request->data['Friend']['user_id'];
			
			if($this->requestAction('/requests/acceptRequest/'.$requestid)){
				if ($this->Friend->save($this->request->data)) {
					/*Le damos vuelta a los datos para hacer una doble inserción
					ya que si 'a' es amigo de 'b', 'b' es amigo de  'a'*/
					$this->request->data['Friend']['amigo']=$amigode;
					$this->request->data['Friend']['user_id']=$userid;

					$this->Friend->create();
						if($this->Friend->save($this->request->data)){
							$this->Session->setFlash(__('Añadido nuevo amigo'));
							return $this->redirect(array('action' => 'index'));
						}else{
							$this->Session->setFlash(__('Upsss no hemos podido añadir el amigo, intentalo de nuevo'));
						}	
					}else{
						$this->Session->setFlash(__('Upsss no hemos podido añadir el amigo, intentalo de nuevo'));
					}
			} else {

				$this->Session->setFlash(__('Upsss no hemos podido añadir el amigo, intentalo de nuevo'));
			}
		}
	}


	public function delete($id = null) {
		$this->Friend->id = $id;
		$this->request->allowMethod('post', 'delete');
		if ($this->Friend->delete()) {
			$this->Session->setFlash(__('Amistad eliminada, sus post se eliminaran de tu muro'));
		} 
		return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
	if($this->Auth->user()['id']!=null){
		return true;
	}
		return false;
}


	public function getFriends($id = null){

		if($id!=null){
			$options = array('conditions' => array('amigo' => $id),
							 'fields'=>array('user_id'));
			$friends[] = $this->Friend->find('all', $options);
				foreach($friends as $friend){
					 foreach($friend as $otro){
					 	$amigos[]=$otro['Friend']['user_id'];
					 }

				 $amigos[]=$id;
				return $amigos;
			}
		}else{
			return $id;
		}

	}


	


	
}
