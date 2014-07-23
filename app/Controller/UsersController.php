<?php

class UsersController extends AppController
{
	public $uses = array('User');
	public $helpers = array('Html', 'Form');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('login', 'register');
	}

	public function login() {}

	public function logout() {}

	public function register()
	{
		if($this->request->is('post'))
		{
			$this->User->create();
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash(__('The user has been created.'));
				$this->redirect(array('controller' => 'users', 'action' => 'login'));
			}
			else
			{
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}
		}
	}
}