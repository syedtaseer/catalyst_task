<?php

require_once 'functions.php';


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
			print_success("Successfully connected to database.");
	
		} catch(exception $e) {
			print_error("Connection failed: " . $e->getMessage());
			exit(1);
	
	    }

	}


	/**
	 * Build query from schema and create table 
	 * reg_table::Regenerate table flag to drop table if exists already
	 */
	public function create_table($schema, $reg_table = true) {
		try {
	
			if($reg_table) {
				$this->conn->query('DROP TABLE IF EXISTS '.$schema['table'].'; ');
			}
			
			$sql = 'CREATE TABLE IF NOT EXISTS '.		$schema['table']	.' ( ';
			foreach ($schema['schema'] as $key => $value) {
				$sql .= $key. " ". $value.",";
			}

			$sql = rtrim($sql, ',').")";

			if ($this->conn->query($sql) === TRUE) {
				print_success( "Table ".$schema['table']." created successfully");
			} else {
			  	print_error( "Error creating table: " . $this->conn->error);
			}

		} catch (Exception $e) {
			print_error("Error: " . $e->getMessage());
				
		}		
		
	}


}