<?php
  session_start( );

  require_once( "../lib/Color.php" );
  require_once( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );
  require_once( "../lib/form_lib.php" );

  Authentication::authenticate( );

  $color = new Color( );

	try {

	  //if form was submitted
	  if( isset($_POST['name'],$_POST['red_value'],$_POST['green_value'],$_POST['blue_value']) ) {
	    $color = new Color( $_POST );

	    if( $color->save( ) ) {
	      Flash::redirect( "show.php?id=" . $color->id, "The new color was created", "success" );
	    }
	  }
	
	} catch( Exception $e ) {
	  $color = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  require( "../inc/_template.php" );
?>
