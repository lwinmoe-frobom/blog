

<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post', array('enctype'=>'multipart/form-data'));

//echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('image',array( 'type' => 'file'));
echo $this->Form->end('Save Post');
?>