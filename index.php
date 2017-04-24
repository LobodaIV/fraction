<?php

spl_autoload_register(function($className)
{
	$file = $className . ".php";
	if( !file_exists($file) )
	{
		die("File with $className not found");
	}

	require_once($file);
});

$f1 = isset($_POST["f1"]) ? $_POST["f1"] : null;
$f2 = isset($_POST["f2"]) ? $_POST["f2"] : null;

if($f1 != null and $f2 != null)
{
	try {
	
		$result = Fraction::add(new Fraction($f1), new Fraction($f2));
	
	}
	catch(FractionException $e)
	{
		echo $e;
	}

	if(isset($result))
	{
		FractionDB::run("INSERT INTO log VALUES(NULL,'$f1','$f2','$result')");
	}
}
else
{
	$_SESSION['msg'] = "Please enter fraction in format numerator/denominator";
}

include 'FractionForm.php';
