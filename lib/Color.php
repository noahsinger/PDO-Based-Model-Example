<?php
	require_once("Model.php");

  class Color extends Model {

    public static function init_fields( ) {
			parent::clear_fields( );
      parent::add_field( new Field( "id",           0, '/[0-9]+/',         'That id is not correct' ) );
      parent::add_field( new Field( "name",        '', '/[a-zA-Z0-9]+/',   'The name cannot be blank' ) );
      parent::add_field( new Field( "red_value",   '', '/[a-fA-F0-9]{2}/', 'The red value must be a 2 digit hex number' ) );
      parent::add_field( new Field( "green_value", '', '/[a-fA-F0-9]{2}/', 'The green value must be a 2 digit hex number' ) );
      parent::add_field( new Field( "blue_value",  '', '/[a-fA-F0-9]{2}/', 'The blue value must be a 2 digit hex number' ) );
    }

    public function code( ) {
      return strtoupper($this->red_value . $this->green_value . $this->blue_value);
    }
  } //end color class
?>