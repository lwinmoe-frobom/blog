<?php echo "Hello ".$name." welcome to 'view post page'";?>
<div class="col-sm-12">
  <div class="container-fluid bg text-center">
    <?php foreach ($posts as $post): ?>
      <div class="col-sm-4">
        <div class="thumbnail">
          <?php echo $this->Html->link($post['Post']['title'],
          array('controller' => 'posts', 'action' => 'view', $post['Post']['id']),array('style'=>'color:black')); ?>
          <?php echo $this->Html->link($this->Html->image('./posts/'.$post['Post']['imagePath'],
            array('alt' => '<Image', 'style'=> 'width:100%;height:200px')),
          array('controller'=>'posts', 'action'=>'view',$post['Post']['id']),
          array('escape'=>false));
          ?>
          <?php echo $this->Html->link('View', array('controller'=>'posts', 'action'=>'view',
            $post['Post']['id']), array('class'=>'btn btn-success'));
            ?>
            <?php
            if($roles=='admin'){

              echo $this->Html->link('Edit', array('controller'=>'posts', 'action'=>'edit',
                $post['Post']['id'],$arr), array('class'=>'btn btn-success'));

              echo $this->Form->postLink(
               '<button class="btn btn-danger">
               Delete
             </button>',
             array('controller'=>'posts',
               'action'   => 'delete', $post['Post']['id'],$arr
               ),
             array(
              'escape'   => false,
              'confirm'  => 'Are you sure ?'
              ));
            }
            ?>


          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
   <ul class = "pager">
   <?php echo '<li class="previous">'.$this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled')).'<li>';?>
   <?php echo '<li>'.$this->Paginator->numbers().'</li>';?>

   <?php echo '<li class="next">'.$this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')).'<li>';?>
 </ul>



