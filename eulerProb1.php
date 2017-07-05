<?php

//EULER PROBLEM 1. If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.
//Find the sum of all the multiples of 3 or 5 below 1000.

/**
 * Finds the multiples of a given number up to the specified limit.
 * @param number: integer to get the multiples over
 * @param limit: get multiples up to the specified limit
 * @return multples: array holding multiples of a given natural number (up to the limit).
 */
function getMultiples($number, $limit)
{
	$multiples = array($number);
	$index = 0;
	while($multiples[$index] <= $limit)
	{
		$toAdd = $number + $multiples[$index];
		if($toAdd >= $limit)
		{
			break;
		}
		array_push($multiples, $toAdd);
		$index++;
	}
	return $multiples;
}

/**
 * Finds the multiples of a collection of natural numbers.
 * @param naturals: collection of natural numbers.
 * @param limit: get multiples up to the specified limit
 * @param deDup: whether or not the returned multiples should return duplicate entries.
 * @return multiplesNatural: array consisting of multiples across a collection of natural numbers.
 */
function getMultiplesAcrossRangeOfNaturals(array $naturals, $limit, $deDup)
{
	$multiplesNatural = array();
	foreach($naturals as $invNatural)
	{
		$multiplesNatural = array_merge($multiplesNatural, getMultiples($invNatural, $limit));
	}
	if($deDup)
	{
		$multiplesNatural = array_unique($multiplesNatural);
	}
	return $multiplesNatural;
}

/**
 * Returns an array of the sum specified.
 * @param multiples: collection of multiples
 * @return sum of the multiples array passed in.
 */
function sumOfMultiples(array $multiples)
{
	return array_sum($multiples);
}

/**
 * Print specified message to user.
 * @param naturals: collection of natural numbers.
 * @param limit: analyze multiples up to the specified limit
 * @param sum: sum over all multiples across a collection of natural numbers.
 */
function printUserMessage(array $naturals, $limit, $sum)
{
	$msg = 'The sum of naturals: '.implode($naturals, ','). ' up to limit: '.$limit.' is: ';
	$msg = $msg.$sum.PHP_EOL;
	print($msg);
}

/**
 * Main function.
 * @param naturals: collection of natural numbers.
 * @param limit: get multiples up to the specified limit
 * @param deDup: whether or not the returned multiples should return duplicate entries.
 */
function main(array $naturals, $limit, $deDup)
{
	$multiples = getMultiplesAcrossRangeOfNaturals($naturals, $limit, $deDup);
	$sum = sumOfMultiples($multiples);
	printUserMessage($naturals, $limit, $sum);
}

$naturals = array(3, 5);
$limit = 1000;
$deDup = true;
main($naturals, $limit, $deDup);

?>
