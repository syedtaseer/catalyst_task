<?php

require_once 'database.php';


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

		    fwrite(STDOUT, $output);
		    exit(1);
		
		} 


		elseif(isset($opts['u']) && isset($opts['p']) && isset($opts['h'])) 		// Connect to database
		{
			$this->db = new DB($opts['h'], $opts['u'], $opts['p']);

		}


	}

}


new UserUpload();