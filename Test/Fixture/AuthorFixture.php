<?php
/**
 * AuthorFixture
 *
 */
class AuthorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '52668e2d-407c-4e80-b849-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-6340-4ab3-bdb0-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-7efc-4e4d-a2db-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-99f0-42fa-a6fc-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-b548-4229-9d2d-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-d0a0-4dff-b677-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-ebf8-45b1-8bfe-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-0750-47d0-8bb7-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-2244-4d8f-8e65-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => '52668e2d-3e00-4d23-8e0b-4723b47db738',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
