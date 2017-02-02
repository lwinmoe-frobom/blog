<?php
class Comment extends AppModel{


	public function isOwnedBy ($comment, $user) {
    	return $this->field ('id', array ( 'id'=>$comment, 'user_id'=>$user )) !== false ;
	}
}


?>