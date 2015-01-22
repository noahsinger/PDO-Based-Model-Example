<?php
  session_start( );
  require_once( "../lib/User.php" );
  require_once( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );

	Authentication::authenticate( );

  try {
		
    $users = User::all( );
		
  } catch( Exception $e ) {
    $colors = array( );
    $_SESSION['flash_fail'] = $e->getMessage( );
  }

  require( "../inc/_template.php" );
?>
