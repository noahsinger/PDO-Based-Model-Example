<div class="swatch">
  <span style="background-color: #<?php echo $color->code( ) ?> ;"></span>
</div>

<h1><?php echo $color->name ?></h1>

<p>
  <?php echo $color->code( ) ?>
</p>

<?php if( Authentication::loggedin( ) ) : ?>
  <p>
    <a href="edit.php?id=<?php echo $color->id ?>">edit</a> |
    <a href="destroy.php?id=<?php echo $color->id ?>">destroy</a>
  </p>
<?php endif ?>

<p>
  <a href="index.php">Back</a>
</p>
