<?php 

function getPrime($number)
{
	$start = 2;
	$limit = $number;
	$end = array();
	while($start <= $limit)
	{
		$factor = $number/$start; 
		$rtn =(((int) ($factor)) == ($factor));
		if($rtn)
		{
			array_push($end, $start);
			$end = array_merge($end, getPrime($factor));
			break;
		}
		else
		{
			$start++;
		}
		$limit = ($factor);
	}
	$end = empty($end) ? array($number): $end;
	return $end;
}

function getUniquePrimes($number)
{
	return array_unique(getPrime($number));
}
var_dump(getUniquePrimes(600851475143));

?>
