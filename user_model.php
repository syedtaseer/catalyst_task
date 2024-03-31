<?php


/**
 * User model
 */
class User
{
	
	private $table = 'users';
	private $id, $name, $surname, $email, $entry_date;
	

	function __construct($name, $surname, $email)
	{
		$this->name = $name;
		$this->surname = $surname;		
		$this->email = $email;
	}


	/**
	 * Static method to return the table name and schema
	 */
	public static function get_schema()
	{
		$schema = [
			'id' => 'INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
			'name' => 'VARCHAR(50)',
			'surname' => 'VARCHAR(50)',
			'email' => 'VARCHAR(50) UNIQUE',
			'entry_date' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
		];

		return ['table' => 'users', 'schema' => $schema];
	}


	/**
	 * Convert model data to an array
	 */
	public function to_array()
	{
		return [
			'name' => '"'.$this->name.'"',
			'surname' => '"'.$this->surname.'"',
			'email' => '"'.$this->email.'"',
		];			
	
	}
	

}