<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController 
{
      public function beforeFilter() 
      {
          parent::beforeFilter();
          $this->Auth->allow('add','logout','login');
          // $this->Auth->fields=array(        //Login with email
          //           'username'=>'email',
          //           'password'=>'password');
          
     }
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }


  public function add()
        {
            if($this->request->is('post'))
            {
                $this->User->create();
                $psw1=$this->request->data['User']['password'];
                $psw2=$this->request->data['User']['confirm_password'];
                if($psw1!=$psw2)
                {
                    $this->Flash->error(__('Passwords must be the same.'));
                    return false;
                }
                if($this->User->save($this->request->data))
                {
                    return $this->redirect(array('action'=>'login'));
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        
        }
  public function delete($id=null)
        {
          $user_id=$this->Auth->user('id');
          $u_id=$this->User->findById($id);
          $user_role=$this->Auth->user('role');
               
        if($user_id==$u_id['User']['id']|| $user_role=='admin')
        {
          
        if ($this->User->delete($id)) 
        {
            $this->Flash->success(
                __('The user with id: %s has been deleted.', h($id))
            );
        } 
        else 
        {
            $this->Flash->error(
                __('The user with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
    else
    {
        $this->Flash->error(__('You do not own that user list.'));
         return $this->redirect(array('action' => 'index'));
    }    
    }

     public function edit($id=null)
      {
       $user_id=$this->Auth->user('id');
       $u_id=$this->User->findById($id);
       $user_role=$this->Auth->user('role');
         if($user_id==$u_id['User']['id']|| $user_role=='admin')
         {   
           if($this->request->is(array('post','put')))
             {
    //              debug($this->User->id);
                  $this->User->id=$id;
                  $result=$this->User->save($this->request->data);
                  if($result)
                      {
                         $this->Flash->success(__("Your post has been updated."));
                         return $this->redirect(array('action'=>'index'));
                      }

                   $this->Flash->error(__('Unable to update your post.'));
             }
           if(!$this->request->data)
             {
                 $this->request->data=$user_id;
             }
                      
        }
         else
           {
             $this->Flash->error(__('Ha Ha !!This is not your post...'));
              return false;
           }
      }
        
        

    public function login() {

    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            //return $this->redirect($this->Auth->redirectUrl());
            return $this->redirect(array('controller' => 'posts','action' => 'index'));
        }
        $this->Flash->error(__('Invalid username or password, try again'));
    }
}
     public function logout() {

    return $this->redirect($this->Auth->logout());
}
}


?>