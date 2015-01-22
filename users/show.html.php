<h1><?php echo $user->username ?></h1>

<p>
  <?php echo $user->password ?>
</p>

<p>
  <a href="edit.php?id=<?php echo $user->id ?>">edit</a> |
  <a href="destroy.php?id=<?php echo $user->id ?>">destroy</a>
</p>

<p>
  <a href="index.php">Back</a>
</p>
