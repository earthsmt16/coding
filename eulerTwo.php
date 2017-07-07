<?php

function getFibSequence($itemOne, $itemTwo, $limit)
{
	$sum = 0;
	$fibArray = array($itemOne, $itemTwo);
	$sum += determineOddEven($itemOne) ? $itemOne : 0;
	do
	{
		$sum += determineOddEven($fibArray[1]) ? $fibArray[1] : 0;
		$item = $fibArray[0] + $fibArray[1];
		$fibArray[2] = ($item <= $limit) ? $item : false;
		if(empty($fibArray[2])) break;
		unset($fibArray[0]);
		$fibArray = array_values($fibArray);
	}while($fibArray[1] <= $limit);
	return $sum;
}

function determineOddEven($number)
{
	$rtn = 0;
	$div = (int) ($number/2);
	if($div*2==$number) $rtn = 1;
	return $rtn;	
}

$limit = 4000000;
var_dump(getFibSequence(1, 2, $limit));
