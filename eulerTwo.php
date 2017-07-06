<?php

function getFibSequence($itemOne, $itemTwo)
{
	$fibArray = array($itemOne, $itemTwo);
	$index = 0;
	$limit = 1000;
	while($current < $limit)
	{
		$current = $fibArray[$index] + $fibArray[$index+1];
		$index++;
		array_push($fibArray,$current);
	}
	return $fibArray;
}

function determineOddEven($number)
{
	$rtn = 0;
	$div = (int) ($number/2);
	if($div*2==$number)
	{
		$rtn = 1;
	}
	return $rtn;	
}

var_dump(getFibSequence(1,3));
var_dump(determineOddEven(2));
