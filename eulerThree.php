<?php 

function getPrime($number)
{
	$start = 2;
	$limit = $number;
	$end = array();
	while($start <= $limit)
	{
		$rtn =(((int) ($number/$start)) == ($number/$start));
		if($rtn)
		{
			array_push($end, $start);
			$end = array_merge($end, getPrime($number/$start));
			break;
		}
		else
		{
			$start++;
		}
		$limit = ($number/$start);
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
