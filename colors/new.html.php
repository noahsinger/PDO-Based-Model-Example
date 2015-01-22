<h1>Create a Color</h1>

<?php if( ! $color->valid ) : ?>
  <div id="error_explanation">
    <h2>There are error preventing this color from being created</h2>
    <ul>
      <?php foreach( $color->errors as $msg ) : ?>
        <li><?php echo $msg ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<form id="color_form" action="new.php" method="post">

  <?php require( '_form.php' ); ?>

  <p>
    <input type="submit" value="Create Color">
  </p>
</form>

<p>
  <a href="index.php">home</a>
</p>
