<!DOCTYPE html>
<html>
  <head>
    <title>Colors</title>

    <link rel="stylesheet" href="../stylesheets/style.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../stylesheets/colors.css" media="screen" title="no title" charset="utf-8">

  </head>
  <body>
    <header id="main">
      <h1><a href="../colors/index.php">Colors</a></h1>

      <?php require( "../inc/_logo.php" ) ?>

      <nav>
        <ul>
          <li><a href="../colors/index.php">Home</a></li>

          <?php if( Authentication::loggedin( ) ) : ?>
            <li><a href="../colors/new.php">New Color</a></li>
						<li><a href="../users/index.php">Users</a></li>
          <?php endif ?>

          <?php if( ! Authentication::loggedin( ) ) : ?>
            <li><a href="../authentication/login.php">Login</a></li>
          <?php else : ?>
            <li><a href="../authentication/logout.php">Logout</a></li>
          <?php endif ?>
        </ul>
      </nav>

    </header>

    <div id="content">
        <?php Flash::show( ); ?>

        <?php
          $name = basename($_SERVER['PHP_SELF']);
          $parts = explode( '.', $name );
          require( $parts[0] . '.html.php' );
        ?>
    </div>
  </body>











</html>
