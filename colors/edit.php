<?php
  session_start( );

  require( "../lib/Color.php" );
  require( "../lib/Flash.php" );
  require( "../lib/form_lib.php" );
  require_once( "../lib/Authentication.php" );

  Authentication::authenticate( );

	try {

	  $color = Color::find( $_GET['id'] );

	  if( ! $color ) {
	    Flash::redirect("index.php", "The color was not found");
	  }

	  //if the form's been submitted
	  if( isset($_POST['name'],$_POST['red_value'],$_POST['green_value'],$_POST['blue_value']) ) {
	    if( $color->update( $_POST ) ) {
	      Flash::redirect( "show.php?id=" .$color->id, "The color was updated", "success" );
	    }
	  }
		
	} catch( Exception $e ) {
	  $color = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  require( "../inc/_template.php" );
?>
