<?php

function calculateDivisionalNumber($ranges, $jump)
{
	$start = $jump;
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
		$start = !$rtn ? $start+$jump : $start;
	}
	while(!$rtn);
	return $start;
}

function primeNumberCheck($number, $ranges)
{
	$rtn = false;
	foreach($ranges as $invRange)
	{
		if($number != $invRange)
		{
			$test = $number/$invRange;
			$rtn = (((int) $test) == $test);
			if($rtn)
			{
				break;
			}
		}
	}
	return $rtn ? false : true;
}

function getMultipleOfPrimeNumbersFromSet($ranges)
{
	$multiple = 1;
	foreach($ranges as $invRange)
	{
		if(primeNumberCheck($invRange, $ranges))
		{
			$multiple*=$invRange;
		}
	}
	return $multiple;
}

$factors = (array) range(20,2,-1);
$number = calculateDivisionalNumber($factors, getMultipleOfPrimeNumbersFromSet($factors));
var_dump($number);


?>
