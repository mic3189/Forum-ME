<?php

class ProfilesController extends AppController {
	public $helpers = array('Html', 'Form');

	public $components = array('Image');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->loadModel('User');

		if($this->Session->check('Auth.User') OR $this->Auth->login()) {
			$this->set('loginUser', $this->User->find('first', array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')))));
		}
	}

	public function index() {
		$user = $this->User->findById($this->Session->read('Auth.User.id'));

		$userTable = new UserTable($user['User']);
    $this->set('user', $userTable);
	}
}