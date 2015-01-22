<?php
  class Model {

    private static $db = null;
    private static $fields = array( );

		//to be implemented by inheriting class
    public static function init_fields( ) {}
			
		public static function add_field( $field ) {
			array_push(self::$fields, $field);
		}
		
		public static function clear_fields( ) {
			self::$fields = array( );
		}

    private static function connect_db( ) {
      static::init_fields( );

      if( self::$db == null ) {
			  self::$db = new PDO("mysql:host=localhost;dbname=php", 'php_user', 'mc427');
				self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      }
    }
		
		public static function get_db( ) {
			self::connect_db( );
			return self::$db;
		}

    public static function table_name( ) {
			return strtolower(get_called_class( )) . 's';
    }

    public static function all( ) {
      self::connect_db( );
      $objects = array( );

			//executes and returns results
			$results = self::$db->query('SELECT * from ' . self::table_name( ));
			
			//fetch gives assoc array by default
			while($record = $results->fetch()) {
				$objects[$record['id']] = new static($record);
			}

      return $objects;
    }

    public static function find( $id ) {
      self::connect_db( );

			//prepare a statement to be executed
			$sth = self::$db->prepare("select * from " . self::table_name( ) . " where id=:id");
			
			//execute the statement with the included id value
			$sth->execute(array(':id' => $id));
			
			if( $sth->rowCount( ) == 1 ) {
				//fetch gives assoc array by default
				return new static($sth->fetch());
			}

      return null;
    }

    ////////////////////////////////////////

    private $attributes = array( );
    private $errors = array( );

    public function __construct( $data = array( ) ) {
      self::connect_db( );
			
			//fill defaults for all fields
			foreach( self::$fields as $field ) {
				$this->$field = $field->default;
			}

			//fill specific values passed to constructor (if there are any)
      foreach( self::$fields as $field ) {
        if( isset($data[$field->name]) ) {
					$this->$field = $data[$field->name];
        }
      }
    }

    // $c->red_value = 'ff';
    public function __set( $name, $value ) {
      $this->attributes[$name] = $value;
    }

    // $c->red_value
    public function __get( $name ) {
      if( $name == "valid" ) {
        return (count($this->errors) == 0);
      } if( $name == "errors" ) {
        return $this->errors;
      } else {
        return $this->attributes[$name];
      }
    }

    public function validate( ) {
      $valid = true;

      foreach( self::$fields as $field ) {
        if( ! preg_match( $field->pattern, $this->$field ) ) {
          $this->errors[$field->name] = $field->error;
          $valid = false;
        }
      }

      return $valid;
    }

    public function save( ) {
      if( $this->validate( ) ) {
        self::connect_db( );
				
				$field_names = array();
				$field_values = array();
				foreach( self::$fields as $field ) {
					//we dont' want to set the id so it needs to not be part
					// of the field names and values we'll use
					if( $field != 'id' ) {
						array_push($field_names,$field);
						$field_values[$field->name] = $this->$field;
					}
				}
				
				$field_names = join(',', $field_names);
				
				$sth = self::$db->prepare("insert into " . self::table_name( ) . " (" . $field_names . ") values (:name,:red_value,:green_value,:blue_value)");
				$sth->execute($field_values); //attributes should be an assoc array with the values in it
				
        if( $sth->rowCount( ) == 1 ) {
          $this->id = self::$db->lastInsertId();
          return true;
        }
      }

      return false;
    }

    public function update( $data ) {
      foreach( self::$fields as $field ) {
        if( isset($data[$field->name]) ) {
          $this->$field = $data[$field->name];
        }
      }			

      if( $this->validate( ) ) {
				self::connect_db( );
				
				$sth = self::$db->prepare("update " . self::table_name( ) . " set " . $this . " where id=:id");
				$sth->execute(array(":id" => $this->id));
				
        if( $sth->rowCount( ) == 1 ) {
          return true;
        }
      }

      return false;
    }

    public function destroy( ) {
      self::connect_db( );

			$sth = self::$db->prepare("delete from " . self::table_name( ) . " where id=:id");
			$sth->execute(array(":id" => $this->id));

      if( $sth->rowCount( ) == 1 ) {
        return true;
      }

      return false;
    }

    public function valid( $name ) {
      return ! isset( $this->errors[$name] );
    }

    public function __toString( ) {
      $output = array();
			
			foreach( self::$fields as $field ) {
				if( $field != 'id' ) {
					array_push($output, $field . "=" . self::$db->quote($this->$field));
				}
			}
			
			return join(',', $output);
    }

  } //end color class


  class Field {
    private $attributes = array( );

    public function __construct( $name, $default, $pattern, $error ) {
      $this->name = $name;
      $this->default = $default;
      $this->pattern = $pattern;
      $this->error = $error;
    }

    public function __set( $name, $value ) {
      $this->attributes[$name] = $value;
    }

    public function __get( $name ) {
      return $this->attributes[$name];
    }

    public function __toString( ) {
      return $this->name;
    }
  }
?>