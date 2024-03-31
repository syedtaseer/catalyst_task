<?php

/**
 * Define constants to beutify the output
 */
define ('ESC', "\033");
define ('CLOSE', ESC."[0m");
define('YELLOW', ESC."[33m");
define('RED', ESC."[31m");
define('GREEN', ESC."[32m");
define('ITALIC', ESC."[3m");

/**
 * Constants for validation methods
 */
define('TITLE', 0);
define('LOWER', 1);
define('UPPER', 2);



/**
 * Print standard output
 */
function print_std($msg, $eol = false, $format = null) {
	if($format != null)
		$msg = $format.$msg.CLOSE;
	
	$msg = (($eol) ? PHP_EOL : "").$msg;
    fwrite(STDOUT, $msg);
}


/**
 * Print output as success message
 */
function print_success($msg, $eol = true) {
	$msg = (($eol) ? PHP_EOL : "").GREEN.$msg.CLOSE;
    fwrite(STDOUT, $msg);
}


/**
 * Print output as error message
 */
function print_error($msg, $eol = true) {
	$msg = (($eol) ? PHP_EOL : "").RED.$msg.CLOSE;
    fwrite(STDOUT, $msg);
}


/**
 * Change text formats
 */
function clean_data($value, $type){
    $value = trim($value);
    if($type == TITLE) {
        return ucfirst(strtolower($value));
    }

    if ($type == LOWER) {
        return strtolower($value);
    }

    if ($type == UPPER) {
        return strtoupper($value);
    }

}