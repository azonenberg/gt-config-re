#!/usr/bin/php
<?php

$basepath = "vivado-project/xcku-gty.srcs/sources_1/ip/gtwizard_ultrascale_0";
$lines = file("$basepath/synth/gtwizard_ultrascale_0_gtye4_common_wrapper.v");

$state = 0;

echo "name,value\n";
foreach($lines as $line)
{
	$line = trim($line);

	//look for start of parameters block
	switch($state)
	{
		case 0:
			if(strpos($line, '#('))
				$state = 1;
			break;

		case 1:
			if(strpos($line, 'common_inst'))
				$state = 2;
			else
				DoParameter($line);
			break;

		case 2:
			break;
	}
}

function DoParameter($line)
{
	//Split at parenthesis to separate parameter name and value
	$fields = explode('(', $line);
	$pname = trim($fields[0]);
	$pname = str_replace('.GTYE4_COMMON_', '', $pname);
	$pval = trim($fields[1]);
	$pval = explode(')', $pval)[0];

	//For now, skip any parameter which ends in _TIE_EN or _VAL as this indicates a port tieoff
	if(strpos($pname, '_TIE_EN') || strpos($pname, '_VAL') )
		return;

	//remove tieoffs of ports, those go separately
	if( (strpos($pname, 'AEN_') === 0) || (strpos($pname, 'A_') === 0) )
		return;

	echo "$pname,$pval\n";
}

?>
