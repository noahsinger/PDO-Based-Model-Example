
<table class="colors">
  <tr class="headers">
    <th>Name</th>
    <th>Code</th>
  </tr>
  <?php foreach( $colors as $color ) : ?>
    <tr>
      <td class="name"><?php echo $color->name ?></td>
      <td class="color" style="background-color: #<?php echo $color->code( ) ?>;">
        <a href="show.php?id=<?php echo $color->id ?>">#<?php echo $color->code( ) ?></a>
      </td>
      <?php if( Authentication::loggedin( ) ) : ?>
        <td class="edit">
          <a href="edit.php?id=<?php echo $color->id ?>"><span>edit</span></a>
        </td>
        <td class="destroy">
          <a href="destroy.php?id=<?php echo $color->id ?>"><span>destroy</span></a>
        </td>
      <?php endif ?>
    </tr>
  <?php endforeach ?>
</table>
