<html>
   <head><title>View</title></head>
   <body>
   <table>
   <tr>
   <th></th>
   <th></th>
   </tr>

   <tr><td>Title</td>
      <td> <h1><?php echo ($post['Post']['title']); ?></h1></td>
       
       </tr>
       <tr><td>Article</td>
         <td>  <p><?php echo h($post['Post']['body']); ?></p></td>
         </tr>
         <tr>
         <td>Created</td>
         <td><p><small> <?php echo $post['Post']['created']; ?></small></p></td>
         </tr></table>
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
                      'DELETE', array(
                                'controller'=>'Comments',
                                'action'=>'delete',$comment['Comment']['id'],$comment['Comment']['post_id'],
                                'type'=>'button'
                        ),
                      array(
                            'confirm'=>'Are you sure? Do you want to delete?'
                        )
                  );
             }
             echo "<br/><hr/>";

        } 


        $postid=$post['Post']['id'];
        echo  $this->Form->create('Comment', array('url'=>array('controller'=>'Comments','action'=>'savecomment', $postid)));
        
        echo $this->Form->input('comment', array('type' => 'text'));
        echo "</br>";
        echo $this->Form->button('Save Comment');
?>


        
   </body>
</html>