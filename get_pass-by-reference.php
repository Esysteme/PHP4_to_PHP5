<?php

$file = file_get_contents("file_test.php");

preg_match_all("#([a-zA-Z_]{1}[a-zA-Z0-9_]*)[ ]*\((.+)\)[ ]*;#U", $file, $out, PREG_PATTERN_ORDER);

$i=0;
foreach($out[2] as $params)
{
  //print_r($params);
	$vars = explode(",",$params);
	foreach ($vars as $var)
	{
		$var = trim($var);
		
		if (mb_substr($var,0,2) === "&$")
		{
			echo "function ".$out[1][$i]." ( ".$var." )\n";
		}
	}
	
	$i++;
}
	
	
