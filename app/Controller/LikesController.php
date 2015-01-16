<?php
App::uses('AppController', 'Controller');

class LikesController extends AppController {
	public $components = array('Paginator');

	public function index() {
		$this->Like->recursive = 0;
		$this->set('likes', $this->Paginator->paginate());
	}

	
	public function add() {
		if ($this->request->is('post')) {
			$this->Like->create();
			debug($this->request->data);
			$userid=$this->request->data['Like']['user_id'];
			$postid=$this->request->data['Like']['post_id'];
			$condition=array('user_id'=>$userid, 'post_id'=>$postid);
			if($this->Like->hasAny($condition)){
				$sql="DELETE FROM likes WHERE user_id=".$userid." and post_id=".$postid;
				$this->Like->query($sql);
				return $this->redirect($this->Auth->redirect());
			}
			if ($this->Like->save($this->request->data)) {
				return $this->redirect($this->Auth->redirect());
			}
		}
		return $this->redirect(array('controller'=>'posts','action'=>'index'));
	}


	public function isAuthorized($user) {
		if($user['id']!=null){
		return true;
		}
		return false;
	}

	public function getLikes(){
		$query=$this->Like->query("SELECT post_id as post, count(user_id) as numLikes FROM likes GROUP BY post_id;");
		$valores=array();
		foreach ($query as $likes) {
			$valores[$likes['likes']['post']]=$likes[0]['numLikes'];
		}

		return $valores;
	}



	
}
