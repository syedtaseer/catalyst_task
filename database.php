<?php


/**
 * Database class
 */
class DB
{
	
	private $conn;

	function __construct($host, $user, $pass, $db='catalyst') 						// default database is 'catalyst'
	{
		try {
			$this->conn = new mysqli($host, $user, $pass, $db);
			fwrite(STDOUT, "Successfully connected to database.");
	
		} catch(exception $e) {
			fwrite(STDOUT, "Connection failed: " . $e->getMessage());
			exit(1);
	
	    }

	}


}