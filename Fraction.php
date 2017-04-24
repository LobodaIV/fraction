<?php

class Fraction
{
	private $numerator;
	private $denominator;

	public function __construct($fraction)
	{	
		
		if(self::isValidFraction($fraction))
		{
			$this->numerator = (int)explode("/",$fraction)[0];
			$this->denominator = (int)explode("/", $fraction)[1];
		}
		else
		{
			throw new FractionException("Invalid arguments");
		}

	}

	public function __toString()
	{
		return $this->numerator . "/" . $this->denominator;
	}

	public function multiplyBy($number)
	{
		$this->numerator *= $number;
		$this->denominator *= $number;
	}

	public static function add(Fraction $f1, Fraction $f2)
	{
		
		$f1Temp = clone $f1;
		$f2Temp = clone $f2;
		
		$f1Temp->multiplyBy($f2->denominator);
		$f2Temp->multiplyBy($f1->denominator);

		$numerator = $f1Temp->numerator + $f2Temp->numerator;
		return new Fraction("$numerator/$f1Temp->denominator");
	}

	public function isValidFraction($fraction)
	{
		if(preg_match('/^\d+/', $fraction))
		{
			return 1;
		}
	}
}