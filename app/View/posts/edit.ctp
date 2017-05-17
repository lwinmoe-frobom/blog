<h1>Edit Post</h1>

<?php

echo $this->Form->create('Post', array('inputDefaults'=>array('div'=>'form-group','wrapInput'=>false, 'class'=>'form-control'),'class'=>'well'));
echo $this->Form->input('title', array('style'=>'width:30%;'));
echo $this->Form->input('body', array('rows' => '3', 'style'=>'width:30%;'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit('Save', array('class'=>'btn btn-default'));
echo $this->Form->end();
?>