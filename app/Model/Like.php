<?php
App::uses('AppModel', 'Model');

class Like extends AppModel {


	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
		
			),
		),
		'post_id' => array(
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
		),
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
