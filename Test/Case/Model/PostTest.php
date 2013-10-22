<?php
App::uses('Post', 'Model');
App::uses('TaggecPost', 'Model');
App::uses('Hash', 'Utility');

/**
 * Post Test Case
 *
 */
class PostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post',
		'app.comment',
		'app.author',
		'app.tagged_post',
		'app.summary',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Post);

		parent::tearDown();
	}

	public function testSaveTags() {
		$data = array(
			'Post' => array(
				'title' => 'A test title',
				'body' => 'Just a body for testing.'
			),
			'Tag' => array(
				1 => array(
					'tag_id' => 'tag-3'
				),
				2 => array(
					'tag_id' => 'tag-5'
				)
			)
		);
		$this->Post->saveTags($data);

		// test that data was saved into posts
		$lastSavedPost = $this->Post->find('first', array(
			'conditions' => array(
				'Post.id' => $this->Post->id
			)
		));
		$this->assertTrue((bool)$lastSavedPost);

		$this->assertEquals($data['Post'], array_intersect_key($lastSavedPost['Post'], $data['Post']));

		// test that data was saved into tagged_posts
		$lastSavedTaggedPost = $this->Post->TaggedPost->find('all', array(
			'conditions' => array(
				'TaggedPost.post_id' => $this->Post->id
			),
			'order' => array('TaggedPost.tag_id asc')
		));

		$taggedPostTagIds = hash::extract($lastSavedTaggedPost, '{n}.TaggedPost.tag_id');
		$TagIds = hash::extract($data, 'Tag.{n}.tag_id');

		$this->assertTrue((bool)$lastSavedTaggedPost);
		$this->assertEquals($taggedPostTagIds, $TagIds);
	}

}
