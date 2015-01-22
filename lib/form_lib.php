<?php
  function text_field( $name, $object, $size = 0 ) {
    $nice_name = ucwords(implode( ' ', explode('_', $name)));

    if( ! $object->valid($name) ) {
      echo '<p class="error_field">';
    } else {
      echo '<p>';
    }

    echo '<label for="' . $name . '">';
    echo $nice_name;
    echo '</label>';
    echo '<input type="text"';

    if( $size > 0 ) {
      echo ' size="' . $size . '"';
      echo ' maxlength="' . $size . '"';
    }


    echo ' name="' . $name . '"';
    echo ' value="' . $object->$name . '">';

    echo '</p>';
  } //end function
	
  function password_field( $name, $color, $size = 0 ) {
    $nice_name = ucwords(implode( ' ', explode('_', $name)));

    if( ! $color->valid($name) ) {
      echo '<p class="error_field">';
    } else {
      echo '<p>';
    }

    echo '<label for="' . $name . '">';
    echo $nice_name;
    echo '</label>';
    echo '<input type="password"';

    if( $size > 0 ) {
      echo ' size="' . $size . '"';
      echo ' maxlength="' . $size . '"';
    }


    echo ' name="' . $name . '"';
    echo ' value="' . $color->$name . '">';

    echo '</p>';
  } //end function
?>