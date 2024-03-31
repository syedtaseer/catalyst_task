<?php

/**
 * Define formating to beutify the output
 */
define ('ESC', "\033");
define ('CLOSE', ESC."[0m");
define('YELLOW', ESC."[33m");
define('RED', ESC."[31m");
define('GREEN', ESC."[32m");
define('ITALIC', ESC."[3m");



function print_std($msg) {
    fwrite(STDOUT, $msg);
}

function print_success($msg, $eol = true) {
	$msg = (($eol) ? PHP_EOL : "").GREEN.$msg.CLOSE;
    fwrite(STDOUT, $msg);
}

function print_error($msg, $eol = true) {
	$msg = (($eol) ? PHP_EOL : "").RED.$msg.CLOSE;
    fwrite(STDOUT, $msg);
}


