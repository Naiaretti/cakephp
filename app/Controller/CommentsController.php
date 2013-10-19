<?php
class CommentsController extends AppController {
	public function index(){
		$comments = $this->Comments->find('all');
	}

/**
 * add method
 * 
 */
	public function add(){
		if (!$this->request->data) {
			throw new CakeException('No comment sent');
		}

		$result = $this->Comment->save($this->request->data);
		if ($result) {
			echo $this->Session->setFlash(__('Your comment has been posted.'));
		}else{
			echo $this->Session->setFlash(__('Comment was not saved'));
		}

		//find me the exact post that has same id as the post_id of the comment
		$post = $this->Comment->Post->find('first', array(
			'conditions' => array(
				'Post.id' => $this->request->data['Comment']['post_id']
			),
			'contain' => array(
				'Comment',
				'TaggedPost'
			)
		));
		$this->set(compact('post'));
		$this->request->data = null;
		$this->render('/posts/view/');
	}

	public function view(){

	}

/**
 * delete method
 * 
 * @param String $id
 * @return void
 */
	public function delete($id, $postId){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Comment->delete($id)) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		}
		$this->redirect(array('controller' => 'posts', 'action' => 'view/' . $postId));
	}
}
?>