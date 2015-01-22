<?php
  session_start( );

  require( "../lib/Color.php" );
  require( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );

  Authentication::authenticate( );

	try {

	  $color = Color::find( $_GET['id'] );

	  if( ! $color ) {
	    Flash::redirect("index.php", "That color was not found");
	  }

	  $color->destroy( );
		
	} catch( Exception $e ) {
	  $color = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  Flash::redirect("index.php", "The color was destroyed", "success");
?>
