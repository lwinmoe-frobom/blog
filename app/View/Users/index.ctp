<h1>Welcome User List Page</h1>
<table class="table table-bordered table-striped">

    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>UserName</th>
        <th>role</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
        $counter=1;
        foreach ($users as $user): ?>
    <tr>
        <td><?php echo $counter; ?></td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>

    <td>

    <?php
        echo $this->Html->link('Edit', array('action'=>'edit',$user['User']['id']), array('class'=>'btn btn-success'));
    ?>
    </td>

	<td>
    <?php
    echo $this->Form->postLink(
                    '<button class="btn btn-danger">
                    Delete
                     </button>',
                    array(
                          'action'   => 'delete', $user['User']['id']
                          ),
                    array(
                          'escape'   => false,
                          'confirm'  => 'Are you sure ?'
                         ));
    ?>
    </td>
    </tr>
    <?php
    $counter++;
    endforeach; ?>


</table>