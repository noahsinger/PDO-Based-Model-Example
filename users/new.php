<?php
  session_start( );

  require_once( "../lib/User.php" );
  require_once( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );
  require_once( "../lib/form_lib.php" );

  Authentication::authenticate( );

  $user = new User( );

	try {

	  //if form was submitted
	  if( isset($_POST['username'],$_POST['password']) ) {
	    $user = new User( $_POST );

	    if( $user->save( ) ) {
	      Flash::redirect( "show.php?id=" . $user->id, "The new user was created", "success" );
	    }
	  }
	
	} catch( Exception $e ) {
	  $user = null;
		Flash::redirect( "index.php", $e->getMessage( ) );
	}

  require( "../inc/_template.php" );
?>
