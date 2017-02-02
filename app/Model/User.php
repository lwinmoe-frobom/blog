<?php
    App::uses('AppModel','Model');
    App:: uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
    //MODEL FOR USER
    class User extends AppModel
    {
        public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            )
        ),
        'email' =>array(
            'required'=>array(
                'rule'=>array('notBlank','email')
                )
            ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        ),
       'confirm_password'=>array(
            'required'=>array(
                'rule'=>array('notBlank'),
                'message'=>'Fill this field please'
                )
            ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
public function beforeSave($options=array())
    {
        if(isset($this->data[$this->alias]['password']))
        {
            $passwordHasher=new BlowfishPasswordHasher();
            $this->data[$this->alias]['password']=$passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }
public function isOwnedBy($post, $user) {
            return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
            }

   
    }
?>