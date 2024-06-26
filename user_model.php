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
		$this->name = clean_data($name, TITLE);
		$this->surname = clean_data($surname, TITLE);		
		$this->email = clean_data($email, LOWER);
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


	/**
	 * Validate email of user
	 */
	public function validate_email()
	{
		return filter_var($this->email, FILTER_VALIDATE_EMAIL);
	}


	/**
	 * Getter Setter
	 */
	public function get_email()
	{
		return $this->email;
	}

}