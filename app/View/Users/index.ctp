<h1>Welcome User List Page</h1>
<table>

    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>UserName</th>
        <th>role</th>
        <th>date</th>
    </tr>



    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>

		<td>
		<?php
			echo $this->Form->postLink(
										'Delete',
											array('action' => 'delete', $user['User']['id']),
											array('confirm' => 'Are you sure?')
																		);
																		?>
		<?php
			echo $this->html->link(
									'Edit', array('action' => 'edit', $user['User']['id'])
																		);
																		?>
	</td>
        </tr>
    <?php endforeach; ?>
</table>