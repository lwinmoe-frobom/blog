 <?php
class PostsController extends AppController
{
     public $helpers = array('Html', 'Form');
     public $components = array('Flash');
     public function index()

        {

        		$this->Post->recursive=0;
			 				$this->paginate=array(
			 							'limit'=>6,
			 							'order'=>array(
			 							'Post.created'=>'desc'
			 							));
							$this->set('posts',$this->paginate());/////paginate
            $this->set('name',$this->Auth->user('username'));
            $this->set('arr','null');
            $this->set('roles',$this->Auth->user('role'));
        }

     public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            $filePath="./img/posts/".$this->request->data['Post']['image']['name'];
            $filename=$this->request->data['Post']['image']['tmp_name'];
            if(move_uploaded_file($filename, $filePath))
            {
                echo "File Uploaded Successfully.";
                $this->request->data['Post']['imagePath']=$this->request->data['Post']['image']['name'];
                $this->request->data['Post']['user_id']=$this->Auth->user('id');
                if ($this->Post->save($this->request->data)) {
                     $this->Flash->success(__('Your post has been saved.'));
                     return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to add your post.'));
            }


        }
  }
     public function view($id)
      {
          $this->loadModel("Comment");

          if (!$id){
                 throw new NotFoundException(__('Invalid post'));
             }
          $post = $this->Post->findById($id);
          if (!$post){
                throw new NotFoundException(__('Invalid post'));
              }
            $user_id=$this->Auth->user('id');
            $this->set('user_id',$user_id);
            $this->set('post', $post);
            $this->set('comments',$this->Comment->find('all',
              array(
                  'fields'=>array('Comment.comment','Comment.id','AA.username','Comment.user_id', 'Comment.post_id'),
                  'joins'=>array(array(
                      'table'=>'users',
                      'alias'=>'AA', // refer to users Table
                      'type'=>'INNER',    // database inner join
                      'conditions'=>array('Comment.user_id=AA.id','Comment.post_id='.$post['Post']['id']) //'24'='24'
                    ))
                )
          ));
    }

   public function edit($id=null,$arr)
             {
                $user_id=$this->Auth->user('id');
                $post_uid=$this->Post->findById($id);
                $user_role=$this->Auth->user('role');

                if($user_id==$post_uid['Post']['user_id']|| $user_role=='admin')
                {
                       $post=$this->Post->findById($id);
                      if($this->request->is(array('post','put')))
                      {
                           //debug($this->Post->id);
                           $this->Post->id=$id;
                           $result=$this->Post->save($this->request->data);
                           if($result)
                           {
                            if($arr=='postmanage')
                              {
                              $this->Flash->success(__("Your post has been updated."));
                              return $this->redirect(array('action'=>'post'));
                              }
                            else
                              {
                              $this->Flash->success(__("Your post has been updated."));
                              return $this->redirect(array('action'=>'index'));
                              }
                           }
                           $this->Flash->error(__('Unable to update your post.'));
                      }
                      if(!$this->request->data)
                      {
                         $this->request->data=$post;
                      }
                   }
                else
                {
                  $this->Flash->error(__('Ha Ha !!This is not your post...'));
                  return false;
                }
            }

    public function delete($id,$arr) {
       if ($this->request->is('get'))
            {
              throw new MethodNotAllowedException();
            }
              $user_id=$this->Auth->user('id');
              $post_uid=$this->Post->findById($id);
              $user_role=$this->Auth->user('role');

                if($user_id==$post_uid['Post']['user_id']||$user_role=='admin')
                  {
                     if ($this->Post->delete($id))
                     {
                         $this->Flash->success(
                          __('The post with id: %s has been deleted.', h($id)));
                     }
                     else
                     {
                      $this->Flash->error(
                          __('The post with id: %s could not be deleted.', h($id))
                      );
                     }
                     if($arr=='postmanage')
                     {
                      return $this->redirect(array('action' => 'post'));
                     }
                     else
                     {
                      return $this->redirect(array('action'=>'index'));
                     }
                  }
                  else
                  {
                  $this->Flash->error(__('You do not own that post.'));
                  return $this->redirect(array('action' => 'index'));
                  }
          }


  public function post() {
      $this->set('name',$this->Auth->user('username'));
      $this->set('arr','postmanage');
      $user=$this->Auth->user('id');
      $this->set('posts',$this->Post->find('all',
              array('conditions'=>array('Post.user_id'=>$user
                ))
        ));
  }
}


?>