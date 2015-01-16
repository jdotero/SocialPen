<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Paginator');

public function beforeFilter() {
    parent::beforeFilter();
    // Permisos para todos los usuarios, alta, salir e index.
    $this->Auth->allow('index','add', 'logout');
}

public function login() {
	$this->layout='login';
    if ($this->request->is('post')) {

        if ($this->Auth->login()) {
        	
            return $this->redirect($this->Auth->redirect());
        }
        $this->Session->setFlash(__('Nombre de usuario o password incorrecto'));
    }
    if (isset($this->Auth->user()['id'])){
    	return $this->redirect($this->Auth->redirect());
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}

	/*El index te redirige a login o a posts/index*/
	public function index() {
	if (isset($this->Auth->user()['id'])){
    	return $this->redirect($this->Auth->redirect());
    }
		return $this->redirect($this->Auth->redirect());
	}



public function searchUsers() {
	$this->layout='wall';
	if($this->request->is('post')){
		$this->User->recursive = 0;
		$options=array('name LIKE'=>"%".$this->data['search']['name']."%");
		$this->set('users', $this->Paginator->paginate($options));

		/*Ahora busco los amigos que ya tiene para no repetir solicitudes*/
		$amigos=$this->requestAction('/friends/getFriends/'.$this->Auth->user()['id']);
		$peticiones=$this->requestAction('/requests/activeRequests/'.$this->Auth->user()['id']);
		$this->set('peticiones', $peticiones);
		$this->set('amigos', $amigos);
		$this->set('currentid',$this->Auth->user()['id']);
		$this->set('name', $this->Auth->user()['username']);
		}
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}


	public function add() {
		if($this->request->is('get')){
			$this->layout='register';
		}
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				if ($this->Auth->login()) {
				$this->Session->setFlash(__('Usuario creado correctamente'),'default',array('class'=>'bg-success'));
				return $this->redirect(array('controller'=>'posts', 'action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('El usuario no se ha podido crear, intentelo de nuevo'));
			}
		}

	}

public function isAuthorized($user) {
  	if($user['id']!=null){
  		return true;
  	}
   	return false;

  }

}
