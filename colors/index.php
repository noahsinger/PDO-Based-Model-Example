<?php
  session_start( );
  require_once( "../lib/Color.php" );
  require_once( "../lib/Flash.php" );
  require_once( "../lib/Authentication.php" );

  try {
		
    $colors = Color::all( );
		
  } catch( PDOException $e ) {
    $colors = array( );
    $_SESSION['flash_fail'] = $e->getMessage( );
  }

  require( "../inc/_template.php" );
?>
