<?php

class PostsController extends AppController {

	// public function beforeScaffold($index) {
	// 	echo $this->element('return');
	// }
	
	public $helpers = array('Html', 'Form');
	public $components = array('Paginator');

	public $paginate = array(
		'limit' => 3,
		'maxLimit' => 3,
		'order' => array(
			'Post.created' => 'DESC'
		)
	);

	// lines 21 - 37 is a test of the array merge 'am' function.
	public function index() {
		debug(convertSlash('/I want to/ see how this/works./'));
		$one = array(
			'one1' => 'first',
			'one2' => 'second',
			'one3' => 'third'
		);
		$two = array(
			'two1' => 'fourth',
			'two2' => 'fifth',
			'two3' => 'sixth'
		);
		$three = array(
			'three1' => 'seventh',
			'three2' => 'eighth',
			'three3' => 'nineth'
		);
		pr(am($one, $two, $three), $showHtml = null, $showFrom = true);

		// debug($this->Post->associations());

		// debug("Exists = " . $this->Post->exists('523d6217-e30c-4aaa-95dd-2320307f6222'));

		// Get all models with which this model is associated with based on the type of association passed in as the parameter
		// debug($this->Post->getAssociated('hasMany'));

		// Check if a field / virtual field exists
		// debug($this->Post->hasField('postLabel', true));

		// debug($this->Post->find('first', array(
		// 	'conditions' => array(
		// 		'Post.id' => '523d6217-e30c-4aaa-95dd-2320307f6222'
		// 	),
		// 	'fields' => array(
		// 		'Post.id'
		// 	)
		// )));

		// Check if a field is virtual or not
		// debug($this->Post->isVirtualField('title'));

		// Get all virtual fields in the Post model
		// debug($this->Post->getVirtualField());

		// View virtual fields through the find()
		// debug($this->Post->find('first'));

		$totalPosts = $this->Post->find('count');
		// $num = 24;
		// $loc = "Warwickshire";
		// $mes = "Jennifer is %s years old and lives in %s.";
		// debug(sprintf($mes, $num, $loc)); die;
		$this->Paginator->settings = $this->paginate;

		$posts = $this->Paginator->paginate('Post');

	    $this->set(compact('posts', 'totalPosts'));
	}

/**
 * view method
 * 
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		if (!$id) {
			throw new CakeException(__('Missing Arguements'));
		}

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Id Not Found'));
		}

		$post = $this->Post->find('first', array(
			'conditions' => array(
				'Post.id' => $id
			),
			'contain' => array(
				'TaggedPost' => array('Tag'),
				'Comment'
			)
		));

		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set(compact('post'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$tags = $this->Post->TaggedPost->Tag->find('list', array(
			'fields' => array('tag_name')
		));
		$this->set(compact('tags'));
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				foreach ($this->request->data['Tag'] as $tag) {
					$tagData = array(
						'post_id' => $this->Post->id,
						'tag_id' => $tag['tag_id']
					);
					$this->Post->TaggedPost->create();
					debug($this->Post->TaggedPost->save($tagData)); die;
				}
				$this->Session->setFlash(__('Your post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session-setFlash(__('Unable to add your post.'));
		}
	}

/**
 * edit method
 * 
 * @param  integer $id
 * @return void
 */
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->findById($id);
		
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}

		$this->Post->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Your post has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}


/**
 * delete method
 * 
 * @param  integer $id
 * @return void
 */
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if (!$this->Post->exists($id)) {
			throw new CakeException('Id does not exist');

		}

		if ($this->Post->delete($id)) {
			$this->Post->transactions($id);
			$this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
			return $this->redirect(array('action' => 'index'));
		}
			$this->Session->setFlash(__('An error occured while trying to delete your post. Please try again.'));
	}

}
?>