<?php

function calculateDivisionalNumber($ranges)
{
	$start = $ranges[0];
	$rtn = true;
	do
	{
		foreach($ranges as $key => $range)
		{
			$div = $start/$range;
			$rtn = (((int) $div) == $div) ? true : false;
			if(!$rtn)
			{
				break;
			}
		}
		var_dump($start);
		$start = !$rtn ? $start+$ranges[0] : $start;
	}
	while(!$rtn);
	var_dump($start);
}

$factors = (array) range(20,1,-1);
calculateDivisionalNumber($factors);


?>
