<?php
	require_once("Model.php");

  class User extends Model {

    public static function init_fields( ) {
			parent::clear_fields( );
      parent::add_field( new Field( "id",           0, '/[0-9]+/',         'That id is not correct' ) );
      parent::add_field( new Field( "username",    '', '/[a-zA-Z0-9]+/',   'The username cannot be blank' ) );
			parent::add_field( new Field( "password",    '', '/[a-zA-Z0-9]{4}/', 'The password must be at least 4 characters long' ) );
    }
		
		public static function find_by_username( $username ) {
			$db = parent::get_db( );
			
			$sth = $db->prepare("select * from users where username = :username");
			$sth->execute(array(":username" => $username));
			
			if( $sth->rowCount( ) > 0 ) {
				return new User($sth->fetch( ));
			} else {
				return false;
			}
		}
  } //end color class
?>