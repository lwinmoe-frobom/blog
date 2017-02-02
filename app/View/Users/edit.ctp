h1>Edit Post</h1>

<?php

echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('username');

echo $this->Form->end('Save');
?>