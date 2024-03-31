<?php


$output = array();

for ($i=1; $i <= 100; $i++) { 
	if($i % 15 == 0)
		array_push($output, 'foobar');
	
	elseif ($i  % 3 == 0) 
		array_push($output, 'foo');

	elseif ($i % 5 == 0) 
		array_push($output, 'bar');
	
	else
		array_push($output, $i);

}

fwrite(STDOUT, implode(',', $output));


