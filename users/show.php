<?php
  session_start( );

  require_once( "../lib/User.php" );
  require_once( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );

	Authentication::authenticate( );

	try {
		
	  $user = User::find( $_GET['id'] );
		
	} catch( Exception $e ) {
	  $user = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  if( ! $user ) {
    Flash::redirect( "index.php", "The user was not found" );
  }

  require( "../inc/_template.php" );
?>
