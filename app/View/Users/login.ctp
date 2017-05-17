<div class="users form">
<?php
    echo $this->Html->link('Register Here!', 
            array('controller'=>'users', 'action'=>'add')
        );
?>  

    <?php echo $this->Flash->render('auth');?>
    <?php echo  $this->Form->create('User', array('inputDefaults'=>array(
            'div'=>'form-group',
            'wrapInput'=>false,
            'class'=>'form-control'
    ),
            'class'=>'well'
    ));?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your email and password');?>
        </legend>
        <?php 
            echo $this->Form->input('email', array('style'=>'width:30%;'));
            echo $this->Form->input('password', array('style'=>'width:30%;'));
        ?>
    </fieldset>
    <?php echo $this->Form->submit('Login', array('class'=>'btn btn-default'))?>
    <?php echo $this->Form->end();?>
</div>