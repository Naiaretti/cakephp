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
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'key' => 'primary'),
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
			'id' => 'post-1',
			'title' => 'test 1',
			'body' => 'post',
			'created' => '2013-10-21 12:59:47',
			'modified' => '2013-10-21 12:59:47',
			'author_id' => ''
		),
		array(
			'id' => 'post-2',
			'title' => 'test 2',
			'body' => 'post',
			'created' => '2013-10-21 13:14:18',
			'modified' => '2013-10-21 13:14:18',
			'author_id' => ''
		),
		array(
			'id' => 'post-3',
			'title' => 'another test',
			'body' => 'post',
			'created' => '2013-10-21 15:31:31',
			'modified' => '2013-10-21 15:31:31',
			'author_id' => ''
		),
		array(
			'id' => 'post-4',
			'title' => 'test 3 ',
			'body' => 'post',
			'created' => '2013-10-21 15:39:48',
			'modified' => '2013-10-21 15:39:48',
			'author_id' => ''
		),
	);

}
