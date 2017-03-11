<?php

class Vehicle
{
	public static function create($type, $wheels)
	{
		switch($type)
		{
			case 'car':
				return new Car($wheels);
			case 'truck':
				return new Truck($wheels);
			default:
				return new stdClass();
		}
	}

	public function getType()
	{
		return get_class($this);
	}
}

class Car extends Vehicle 
{
	private $wheels;

	public function __construct($wheels)
	{
		$this->wheels = $wheels;
	}
}

class Truck extends Vehicle 
{
	private $wheels;

	public function __construct($wheels)
	{
		$this->wheels = $wheels;
	}
}