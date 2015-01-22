<?php
  session_start( );

  require( "../lib/User.php" );
  require( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );

  Authentication::authenticate( );

	try {

	  $user = User::find( $_GET['id'] );

	  if( ! $user ) {
	    Flash::redirect("index.php", "That user was not found");
	  }

	  $user->destroy( );
		
	} catch( Exception $e ) {
	  $user = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  Flash::redirect("index.php", "The user was destroyed", "success");
?>
