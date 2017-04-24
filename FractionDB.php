<?php

class FractionDB
{
	private static $instance;

	private function __construct(){}
	private function __clone(){}

	public static function getInstance()
	{

		if(self::$instance === null)
		{
			self::$instance = new PDO('mysql:host=localhost;dbname=fraction','root','');
		}

		return self::$instance;

	}

	public static function run($sql, $args = [])
    {
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

}