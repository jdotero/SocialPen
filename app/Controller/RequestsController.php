<?php
App::uses('AppController', 'Controller');

class RequestsController extends AppController {


	public $components = array('Paginator');

	public function index() {
		$this->layout='wall';
		$this->Request->recursive = 0;
		$currentuser=$this->Auth->user();
		$options=array('friend'=>$currentuser['id']);
		$this->set('requests', $this->Paginator->paginate($options));
		$this->set('user', $this->Auth->user()['username']);
	}

	public function view($id = null) {
		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Peticion no valida'));
		}
		$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
		$this->set('request', $this->Request->find('first', $options));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Request->create();
			if ($this->Request->save($this->request->data)) {
				$this->Session->setFlash(__('Peticion de amistad echa, esperando respuesta.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La peticion no se ha podido hacer, Upss lo sentimos.'));
			}
		}
	}

	
	public function delete($id = null) {
		$this->Request->id = $id;
		if (!$this->Request->exists()) {
			throw new NotFoundException(__('La peticion no existe'));
		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Request->delete()) {
			return $this->redirect($this->Auth->redirect());
		}
		return $this->redirect($this->Auth->redirect());
	}


	public function isAuthorized($user) {
    // All registered users can add posts
	if($user['id']!=null){
		return true;
	}
    
    if(in_array($this->action , array('index', 'add', 'delete'))){
    	return true;
    }
    if (in_array($this->action, 'acceptRequest')){
    	return true;
    }

    return false;
}

	public function acceptRequest($id=null){
	if($id!=null){
		$this->Request->set(array('id'=>$id));
		if($this->Request->delete($id)){
				return true;
			} 
	}
		return false;
	}

	public function activeRequests($id=null){
		if($id!=null){
			/*Seleccionamos las peticiones que hemos hecho*/
			$options=array('conditions'=>array('user_id'=>$id));
			$Requests=$this->Request->find('all',$options);
			$activeRequests=null;
			/*Nos quedamos solo con las peticiones*/
			foreach ($Requests as $request) {
				$activeRequests[$request['Request']['friend']]=$request['Request']['id'];
			}
			return $activeRequests;
		}
		return null;
	}





}
