<?php

require_once 'database.php';
require_once 'functions.php';
require_once 'user_model.php';


/**
 * User upload class
 */
class UserUpload
{

	private $db;
	
	function __construct() {

		$sopts = "u:p:h:"; 															// define short options in directives
		$longopts = ['file:', 'create_table', 'dry_run', 'help'];					// define long options in directives
		$opts = getopt($sopts, $longopts);


		if (isset($opts['help'])) 													// Help command
		{												
			$output  = "******** Help ********\n";
			$output .= "--file [csv file name]		This is the name of the CSV to be parsed\n";
			$output .= "--create_table			This will cause the MySQL users table to be built (and no further action will be taken)\n";
			$output .= "--dry_run			This will be used with the --file directive in case we want to run the script but not insert into the DB.All other functions will be executed, but the database won't be altered\n";
			$output .= "-u				MySQL username\n";
			$output .= "-p				MySQL password\n";
			$output .= "-h				MySQL host\n";
			$output .= "--help				Which will output the above list of directives with details\n";

		    print_std($output);
		    exit(1);
		
		} 


		if(isset($opts['u']) && isset($opts['p']) && isset($opts['h'])) 		// Connect to database
		{
			$this->db = new DB($opts['h'], $opts['u'], $opts['p']);
		}

		if (isset($opts['create_table'])) 										// Create table command
		{
			$this->create_table('users');
		}

		if (isset($opts['file'])) 												//Load and read data from file and save to database
		{
			$this->load_csv_data($opts['file']);
		}


	}


	/**
	 * Create the table in database
	 */
	public function create_table($name) {
		try {
			if($this->db == null)
				throw new Exception('Database is not connected.');

			$this->db->create_table(User::get_schema());
			
		} catch (Exception $e) {
			print_error("Error: " . $e->getMessage());
			exit(1);
		}
	}


	/**
	 * Load data form csv file to data model and save to database
	 */
	public function load_csv_data($file_name) {
		try {
			if ( !file_exists($file_name) ) {
				throw new Exception('File not found.');
			}

			$file = fopen($file_name, "r");
			$i = 0;
			while (($row = fgetcsv($file)) !== FALSE) {
				$i+=1;

				if($i == 1)
					continue;

				$user = new User($row[0], $row[1], $row[2]);
				$this->db->insert_data(User::get_schema()['table'], $user->to_array());			    
			}

			fclose($file);

		} catch (Exception $e) {
			print_error("Error: " . $e->getMessage());
			exit(1);
		}
	}



}


new UserUpload();