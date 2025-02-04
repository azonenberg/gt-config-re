#!/usr/bin/php
<?php

$dirpath = 'configs/channel';
$dir = opendir($dirpath);
$paths = array();
while($path = readdir($dir))
{
	if(!strpos($path, '.csv'))
		continue;

	array_push($paths, $dirpath . '/' . $path);
}
closedir($dir);

sort($paths);

$data = array();
foreach($paths as $fname)
{
	$base = basename($fname);

	$f = file($fname);
	foreach($f as $line)
	{
		$fields = explode(',', trim($line));
		$name = $fields[0];
		$val = $fields[1];

		if($name == 'name')
			continue;

		$data[$name][$base] = $val;
	}
}

foreach($data as $param => $values)
{
	//Check if all entries have the same value
	$firstval = '';
	$allsame = true;
	foreach($values as $file => $value)
	{
		if($firstval == '')
			$firstval = $value;
		else if($value != $firstval)
			$allsame = false;
	}

	if($allsame)
		echo "\n$param\n    Always $firstval\n";
	else
	{
		echo "\n$param\n";
		foreach($values as $file => $value)
			printf("%30s %s\n", $file, $value);
	}
}

?>
