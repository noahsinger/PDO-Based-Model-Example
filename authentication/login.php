<?php
  session_start( );
	require( "../lib/User.php" );
  require( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );

  if( isset( $_POST['username'], $_POST['password'] ) ) {
		$user = User::find_by_username($_POST['username']);

    if( $user && $user->password == $_POST['password'] ) {
      $_SESSION['loggedin'] = true;
      Flash::redirect("../colors/index.php","You are now logged in","success");
    } else {
      Flash::redirect("login.php", "Your information is not correct");
    }
  }

  require( "../inc/_template.php" );
?>
