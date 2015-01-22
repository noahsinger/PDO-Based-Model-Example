<?php
  class Authentication {
    public static function loggedin( ) {
      return (isset( $_SESSION['loggedin'] ) && $_SESSION['loggedin'] == true);
    }

    public static function authenticate( ) {
      if( ! self::loggedin( ) ) {
        Flash::redirect( "../authentication/login.php","You must login to access that page." );
      }
    }
  } //end class
?>
