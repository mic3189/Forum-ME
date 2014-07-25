<?php

class UsersController extends AppController
{
	public $uses = array('User');
	public $helpers = array('Html', 'Form', 'Session');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('register');
	}
	
	public function login()
	{
		if($this->Session->check('Auth.User') OR $this->Auth->login()) {
      $this->redirect(array('controller' => 'profiles', 'action' => 'index'));     
    }

		if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Session->setFlash(__('Username or password is incorrect'), 'default', array());
      }
    }
	}

	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}

	public function register()
	{
		if($this->request->is('post'))
		{
			$this->User->create();
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash(__('The user has been created.'));
				$this->Session->write('Auth.User.id', $this->User->getId());
				$this->Auth->login($this->data);
        // $this->redirect(array('action' => 'index'));
				$this->redirect(array('controller' => 'users', 'action' => 'profile'));
			}
			else
			{
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}
		}
	}
}