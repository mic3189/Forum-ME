<?php
App::uses('AppModel', 'Model');

class User extends AppModel
{
	public $validate = array(
		'username' => array(
			'nonEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'A username is required.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
        'rule' => array('between', 3, 15),
        'required' => true,
        'message' => 'Usernames must be between 3 to 15 characters'
      )
		),

		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),

		'email' => array(
      'required' => array(
        'rule' => array('email', true),   
        'message' => 'Please provide a valid email address.'    
      ),
       'unique' => array(
        'rule'    => array('isUniqueEmail'),
        'message' => 'This email is already in use',
      )
    )
	);

	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Topic' => array(
			'className' => 'Topic',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function isUniqueEmail($check)
	{
    $email = $this->find(
      'first',
      array(
        'fields' => array(
            'User.id'
        ),
        'conditions' => array(
            'User.email' => $check['email']
        )
      )
    );
 
    if(!empty($email)) {
        if(isset($this->data[$this->alias]['id']) AND $this->data[$this->alias]['id'] == $email['User']['id']){
          return true;
        }else {
          return false;
        }
    }else {
      return true;
    }
  }

	public function beforeSave($options = array())
	{
    $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    return true;
  }
}