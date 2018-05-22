<?php

namespace Kata;

class Calculator
{
    public function add($expr)
    {
    	$sum = 0;

    	// Multi-char delimiter.
    	if (preg_match('/^\/\/\[([^\]]*)\](.*)/', $expr, $matches)) {
    		$delimiter = $matches[1];
    		$expr = $matches[2];

        // Single-car delimiter.
	    } elseif (preg_match('/^\/\/(\D*)(.*)/', $expr, $matches)) {
		    $delimiter = $matches[1];
		    $expr = $matches[2];

	    // Comma delimiter.
	    } elseif (strrpos($expr, ',') !== false) {
    		$delimiter = ',';

        // Newline delimier.
	    } else {
    		$delimiter = "\n";
	    }

	    $numbers = explode($delimiter, $expr);

	    foreach ($numbers as $number) {
    		if ($number < 0) {
    			throw new \RuntimeException('Received a negative integer.');
		    }
		    if ($number >1000) {
    			continue;
		    }
		    $sum += (int) $number;
	    }

	    return $sum;
    }
}
