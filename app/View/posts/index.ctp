<h1>Blog posts</h1>
<p><?php echo $this->Html->link("Add Post", array(
'controller'=>'posts','action' => 'add')); ?></p>
<?php
    echo $this->Html->link("Logout", array(
            'controller'=>'users', 'action'=>'logout'
        ));
?>
<p>
<?php
    echo $this->Html->link('view user list', 
            array('controller'=>'users', 'action'=>'index')
        );
?> 
</p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Image</th>
        <th>Body</th>
        <th>date</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
             array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $this->Html->image('./posts/'.$post['Post']['imagePath'], array('alt' => 'Image', 'style'
                    => 'width:100px; height:100px;'))?></td>
        <td><?php echo $post['Post']['body']; ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
    </td>

<td>
<?php
echo $this->Form->postLink(
'Delete',
array('action' => 'delete', $post['Post']['id']),
array('confirm' => 'Are you sure?')
);
?>
<?php
echo $this->Html->link(
'Edit', array('action' => 'edit', $post['Post']['id'])
);
?>

</td>
</tr>
<?php endforeach; ?>
 <?php unset($post); ?>
</table>
   </body>
</html>
?>

