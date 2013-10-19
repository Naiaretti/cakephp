<?php
	class TagsController extends AppController{

		public function add() {
			if ($this->request->is('post')) {
				$this->Tag->create();
				if ($this->Tag->save($this->request->data)) {
					$this->Session->setFlash(__('New Tag has been added.'));
					return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to create tag.'));
			}
		}
	}
?>