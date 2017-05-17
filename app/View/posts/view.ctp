
<div class="well" style="padding:19px">
   
      <h1><?php echo ($post['Post']['title']); ?></h1>
       
       
       
         <p>Description: <?php echo h($post['Post']['body']); ?></p>
         
         
         <p><small> <?php echo $post['Post']['created']; ?></small></p>
         
           <p align="center">
           <?php echo $this->Html->image('./posts/'. $post['Post']['imagePath'],array(//'alt'=>'Image',//
            'style'=>'width:800px','height'=>'300px;'));
        
           //echo </td>h($post['Post']['imagePath']); ?></p>
        <hr/>
        <h3>User Comments:</h3>
        
        <?php
        /*FETCHING COMMENTS*/
//         debug($comments);
        foreach($comments as $comment)
        {
             echo "Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp  : " .$comment['AA']['username']."<br/>";
             echo "Comment : " . $comment['Comment']['comment']. "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" ;
             if($user_id==$comment['Comment']['user_id'])
             {
                 echo $this->Form->postLink(
                    '<button class="btn btn-danger">
                    Delete
                     </button>',
                    array('controller'=>'comments', 
                          'action'   => 'delete', $comment['Comment']['id'],
                          $comment['Comment']['post_id']
                          ),
                    array(
                          'escape'   => false, 
                          'confirm'  => 'Are you sure ?'
                         ));
             }
             echo "<br/><hr/>";

        } 


        $postid=$post['Post']['id'];
        echo  $this->Form->create('Comment', array('url'=>array('controller'=>'Comments','action'=>'savecomment', $postid)));
        
        echo $this->Form->input('comment', array('type' => 'text','class'=>'form-control', 'style'=>'width:30%;'));
        echo "</br>";
        echo $this->Form->button('Save Comment',array('class'=>'btn btn-default'));
?>
</div>

