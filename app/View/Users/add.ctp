<!-- app/View/Users/add.ctp -->
<h1>Welocme to Users Page</h1>
<div class="users form">
<?php echo $this->Form->create('User', array('inputDefaults'=>array 
    (
        'div'=>'form-group',
        'wrapInput'=>false,
        'class'=>'form-control'
    ),
    'class'=>'well'
)); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('username',array('style'=>'width:30%;'));
        echo $this->Form->input('email',array('style'=>'width:30%;'));
        echo $this->Form->input('password',array('style'=>'width:30%;'));
        echo $this->Form->input('confirm_password', array(
                'type'=>'password',
                'style'=>'width:30%'
            ));
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author'),
            'style'=>'width:30%'
        ));
    ?>
    </fieldset>
    <?php echo $this->Form->submit('Save', array('class'=> 'btn btn-default'))?>
<?php echo $this->Form->end(); ?>
</div>