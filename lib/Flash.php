<?php
  class Flash {
    public static function show( ) {
      $types = array("fail","success");

      foreach( $types as $type ) {
        if( isset( $_SESSION['flash_' . $type] ) ) {
          echo '<div class="flash ' . $type . '">';
          echo $_SESSION['flash_' . $type];
          echo '</div>';
          unset( $_SESSION['flash_' . $type] );
        }
      }
    }

    public static function redirect( $url, $msg = "", $type = "fail" ) {
      if( ! empty($msg) ) {
        $_SESSION['flash_' . $type] = $msg;
      }
      header("location: $url");
      exit;
    }
  } //end class
?>
