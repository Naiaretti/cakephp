<?php
/**
 * PostFixture
 *
 */
class PostFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'body' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'author_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 39, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'id' => '52652543-c814-46c9-bf6f-03ceb47db738',
			'title' => 'test 1',
			'body' => 'post',
			'created' => '2013-10-21 12:59:47',
			'modified' => '2013-10-21 12:59:47',
			'author_id' => ''
		),
		array(
			'id' => '526528aa-6d94-42ac-872b-0b2cb47db738',
			'title' => 'test 2',
			'body' => 'post',
			'created' => '2013-10-21 13:14:18',
			'modified' => '2013-10-21 13:14:18',
			'author_id' => ''
		),
		array(
			'id' => '526548d3-2668-4ca7-a79d-0b29b47db738',
			'title' => 'another test',
			'body' => 'post',
			'created' => '2013-10-21 15:31:31',
			'modified' => '2013-10-21 15:31:31',
			'author_id' => ''
		),
		array(
			'id' => '52654ac4-5a8c-4a3b-9809-03d2b47db738',
			'title' => 'test 3 ',
			'body' => 'post',
			'created' => '2013-10-21 15:39:48',
			'modified' => '2013-10-21 15:39:48',
			'author_id' => ''
		),
		array(
			'id' => '52655090-4a94-444d-bb01-0b2db47db738',
			'title' => 'testing again',
			'body' => 'for the 100th time',
			'created' => '2013-10-21 16:04:32',
			'modified' => '2013-10-21 16:04:32',
			'author_id' => ''
		),
	);

}
