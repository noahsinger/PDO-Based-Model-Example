<?php
  session_start( );

  require_once( "../lib/Color.php" );
  require_once( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );

	try {
		
	  $color = Color::find( $_GET['id'] );
		
	} catch( Exception $e ) {
	  $color = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  if( ! $color ) {
    Flash::redirect( "index.php", "The color was not found" );
  }

  require( "../inc/_template.php" );
?>
