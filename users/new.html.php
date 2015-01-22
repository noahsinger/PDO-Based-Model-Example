<h1>Create a User</h1>

<?php if( ! $user->valid ) : ?>
  <div id="error_explanation">
    <h2>There are error preventing this user from being created</h2>
    <ul>
      <?php foreach( $user->errors as $msg ) : ?>
        <li><?php echo $msg ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<form id="user_form" action="new.php" method="post">

  <?php require( '_form.php' ); ?>

  <p>
    <input type="submit" value="Create User">
  </p>
</form>

<p>
  <a href="index.php">home</a>
</p>
