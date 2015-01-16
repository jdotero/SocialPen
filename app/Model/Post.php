<?php
App::uses('AppModel', 'Model');

class Post extends AppModel {
	public $name = 'Post';

	public $validate = array(
		'contenido' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				),
		),
		'fecha_creacion' => array(
			'date' => array(
				'rule' => array('date'),
				'allowEmpty' => false,
				'required' => false,
				),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Like' => array(
			'className' => 'Like',
			'foreignKey' => 'post_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	public function isOwnedBy($post, $user) {
	    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}


}
