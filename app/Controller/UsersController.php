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

	public function register() {}
}