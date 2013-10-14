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

	public function index() {
		$totalPosts = $this->Post->find('count');

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
			throw new NotFoundException(__('Invalid post'));
		}
		// $test = $this->Post->find('first', array('order' => array('Post.created' => 'DESC')));
		// $commented = $this->Post->Comment->getTotalComments($id);

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
		$this->set(compact('post', 'commented'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$tags = $this->Post->TaggedPost->Tag->find('list', array(
			'fields' => array('label')
		));
		debug($tags);
		$this->set(compact('tags'));
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				foreach ($this->request->data['Tag'] as $tag) {
					$tagData = array(
						'post_id' => $this->Post->id,
						'tag_id' => $tag['tag_id']
					);
					$this->Post->TaggedPost->save($tagData);
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
		// debug($this->request->data); die;
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
			return $this->redirect(array('action' => 'index'));
		}
		echo $this->flash($this->Post->deleteFailed, 'posts/index', $pause = 3, $layout = 'flash');
		// echo $this->Post->deleteFailed;
		// return $this->redirect(array('action'->'index'));
	}
}
?>