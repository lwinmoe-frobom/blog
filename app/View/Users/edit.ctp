<h1>Edit User</h1>

<?php

echo $this->Form->create('User', array(
	'inputDefaults'=> array(
		'div'=>'form-group',
		'wrapInput'=>false,
		'class'=>'form-control'
		),
		'class'=>'well'
	));
echo $this->Form->input('username', array('style'=>'width:30%;'));
echo $this->Form->input('password', array('style'=>'width:30%;'));
echo $this->Form->submit('Save', array('class'=>'btn btn-default'));
echo $this->Form->end();
?>