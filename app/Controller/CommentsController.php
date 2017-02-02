<?php
include "PostsController.php";
class CommentsController extends AppController
{

	public function savecomment($id=null)
	{

		$post_obj=new PostsController;
		
		$post_field=$post_obj->Post->findById($id);
		//debug($post_field);
		$post_id=$post_field['Post']['id'];
		$user_id=$this->Auth->user('id');


		$this->request->data['Comment']['user_id']=$user_id;
		$this->request->data['Comment']['post_id']=$post_id;

		$data=$this->request->data;

		if($this->Comment->save($data))
		{
			$this->Flash->success(__("Success"));
			$this->redirect(array('action'=>'../Posts/view/'.$post_id));
		}
		else
		{
			$this->Flash->error(__("Failed"));
			$this->redirect(array('action'=>'../Posts/view/'.$post_id));
		}

	}

	public function delete($id=null,$pid)
	{
		$uid=$this->Auth->user('id');
		//debug($uid);
		$post_object=new PostsController;
		$post_col=$post_object->Post->findById($pid);

		$comment_col=$this->Comment->findById($id);
		if($uid==$comment_col['Comment']['user_id'])
		{
			if($this->Comment->delete($id))
			{
				$this->Flash->success(__('Successfully Deleted.'));
				$this->redirect(array('action'=>'../Posts/view/'.$post_col['Post']['id']));
			}
			else
			{
				$this->Flash->error(__('Failed to delete.'));
				$this->redirect(array('action'=>'../Posts/view/'.$post_col['Post']['id']));
			}
		}
	}
	
}
?>