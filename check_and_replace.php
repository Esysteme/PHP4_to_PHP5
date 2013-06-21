<?php

date_default_timezone_set("Europe/Paris");

error_reporting(-1);
ini_set('display_errors', 1);

unset ($_SERVER['argv'][0]);
$file_name = implode(" ",$_SERVER['argv']);

if (strstr($file_name,"/GRAPH/"))
{
  exit;
}

$file = "";
$handle = fopen($file_name, "r");
if ($handle)
{
    $nbline = 1;
	
	while (($buffer = fgets($handle)) !== false)
	{
		preg_match_all('#\$[a-zA-Z_]{1}[a-zA-Z0-9_]*(\[([\[(.+)\]])*\])*\[([a-zA-Z_]{1}[a-zA-Z0-9_]*)\]#U',$buffer,$out, PREG_PATTERN_ORDER);
		$nb_to_replace = count($out[0]);
		
		for($i = 0; $i < $nb_to_replace; $i++)
		{
			//echo "[".$out[2][$i]."] => ['".$out[2][$i]."']".PHP_EOL;
			$new = str_replace("[".$out[3][$i]."]","[\"".$out[3][$i]."\"]", $out[0][$i]);
			$buffer = str_replace($out[0][$i],$new,  $buffer);
			echo $file_name.":".$nbline." - ".$out[0][$i]." => ".$new.PHP_EOL;
		}
		$file .= $buffer;
		
		$nbline++;
    }
    if (!feof($handle))
	{
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
	//file_put_contents($file_name,$file);
}
