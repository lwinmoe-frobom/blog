
<?php echo "&nbsp;&nbsp;&nbspHello ".$name." welcome to 'post manage page'<br>";?>
<?php
	if(!$posts){
		echo "&nbsp;&nbsp;&nbspyou need to add more posts";
	}
	?>
<div class="col-sm-12">
<div class="container-fluid bg text-center">
	<?php foreach ($posts as $post):?>
	<div class="col-sm-4">
	<div class="thumbnail">
	<?php echo $this->Html->link($post['Post']['title'],array('controller'=>'posts', 'action'=>'view',$post['Post']['id']),array ('style'=>'color:black'));?>
	<?php echo $this->Html->link($this->Html->image('./posts/'.$post['Post']['imagePath'],array('alt'=>'<Image','style'=>'width:100%;height:200px')),array('controller'=>'posts','action'=>'view',$post['Post']['id']),array('escape'=>false));?>



	<?php
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
	?>

	<?php
		echo $this->Html->link('Edit', array('controller'=>'posts', 'action'=>'edit',$post['Post']['id'],$arr), array('class'=>'btn btn-success'));
    ?>


	</div>
	</div>
	<?php endforeach;?>
</div>
</div>
