

<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post', array('enctype'=>'multipart/form-data', 'inputDefaults'=>array('div'=>'form-group','wrapInput'=>false,'class'=>'form-control'),'class'=>'well'));

//echo $this->Form->create('Post');
echo $this->Form->input('title', array('style'=>'width:30%;'));
echo $this->Form->input('body', array('rows' => '3', 'style'=>'width:30%;'));
echo $this->Form->input('image',array( 'type' => 'file', 'class'=>''));
echo $this->Form->submit('Save Post', array('class'=>'btn btn-default'));
echo $this->Form->end();
?>