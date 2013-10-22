<?php
/**
 * TagFixture
 *
 */
class TagFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'key' => 'primary'),
		'tag_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			
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
			'id' => 'tag-1',
			'tag_name' => 'Software'
		),
		array(
			'id' => 'tag-2',
			'tag_name' => 'Mobile'
		),
		array(
			'id' => 'tag-3',
			'tag_name' => 'Movies'
		),
		array(
			'id' => 'tag-4',
			'tag_name' => 'Real estate'
		),
		array(
			'id' => 'tag-5',
			'tag_name' => 'Database management systems'
		),
		array(
			'id' => 'tag-6',
			'tag_name' => 'PHP'
		),
	);

}
