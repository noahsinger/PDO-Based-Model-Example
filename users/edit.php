<?php
  session_start( );

  require( "../lib/User.php" );
  require( "../lib/Flash.php" );
  require( "../lib/form_lib.php" );
  require_once( "../lib/Authentication.php" );

  Authentication::authenticate( );

	try {

	  $user = User::find( $_GET['id'] );

	  if( ! $user ) {
	    Flash::redirect("index.php", "The user was not found");
	  }

	  //if the form's been submitted
	  if( isset($_POST['username'],$_POST['password']) ) {
	    if( $user->update( $_POST ) ) {
	      Flash::redirect( "show.php?id=" .$user->id, "The user was updated", "success" );
	    }
	  }
		
	} catch( Exception $e ) {
	  $user = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  require( "../inc/_template.php" );
?>
