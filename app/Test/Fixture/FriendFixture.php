<?php
/**
 * FriendFixture
 *
 */
class FriendFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id_user' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'fecha' => array('type' => 'date', 'null' => false, 'default' => null),
		'user_id_friend' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'solicitud' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id_user' => array('column' => array('user_id_user', 'user_id_friend'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id_user' => 1,
			'fecha' => '2014-11-26',
			'user_id_friend' => 1,
			'solicitud' => 1
		),
	);

}
