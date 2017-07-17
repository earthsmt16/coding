<?php

function testIfPalindromeNumber($num)
{
	$num = (string) $num;
	$limit = (int) (strlen($num)/2) ;
	$rtn = true;
	for($index=0;$index<$limit;$index++)
	{
		if($num[$index] != $num[strlen($num)-$index-1])
		{
			$rtn = false;
			break;
		}
	}
	return $rtn;
}

function findMultipleOrders($num, $order)
{
	$testPand = testIfPalindromeNumber($num);
	if(!$testPand) return false;
	$start = array_fill(1, $order-1, 0);
	$start[0] = 1;
	ksort($start);
	$start = implode('', $start);
	$testOne = NULL;
	$testTwo = NULL;	
	do
	{
		if($testOne && $testTwo && (strlen((string) $testOne) <= $order) && (strlen((string) $testTwo)<= $order))
		{
			$ftrs = array($testOne, $testTwo);
		}
		$pand = $num/$start;
		$div = ((int) $pand) == $pand;
		$testOne = $testPand ? $start : $testOne;
		$testTwo = $testPand ? $pand : $testTwo;
		$start++;
	}
	while($start < $num);
        return $ftrs;

}

function findClosestPands()
{
	$start = 998001;
	$fac = 3;
	while($start > 1)
	{
		$content = findMultipleOrders($start, $fac);
		if($content)
		{
			var_dump($content);
			break;
		}
		var_dump($start);
		$start--;
	}
}


findClosestPands();
//var_dump(testIfPalindromeNumber(9801));

?>
