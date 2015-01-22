
<table class="users">
  <tr class="headers">
    <th>Username</th>
    <th>Password</th>
  </tr>
  <?php foreach( $users as $user ) : ?>
    <tr>
			<td><a href="show.php?id=<?php echo $user->id ?>"><?php echo $user->username ?></a></td>
      <td><?php echo $user->password ?></td>
      
      <td class="edit">
        <a href="edit.php?id=<?php echo $user->id ?>"><span>edit</span></a>
      </td>
      <td class="destroy">
        <a href="destroy.php?id=<?php echo $user->id ?>"><span>destroy</span></a>
      </td>
    </tr>
  <?php endforeach ?>
</table>

<p>
	<a href="new.php">New User</a>
</p>