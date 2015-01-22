<?php
  session_start( );
  require("../lib/Flash.php");
  require_once( "../lib/Authentication.php" );

  unset( $_SESSION['loggedin'] );

  Flash::redirect("../colors/index.php","You are now logged out","success");
?>
