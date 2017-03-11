<?php

include_once('Product.php');

class GraphicProduct implements Product
{
	private $mfgProduct;

	public function getProperties()
	{
		$this->mfgProduct="<img style='padding: 10px 10px 10px 0px';
		src='/LearningPHPDesignPatterns/CreationalDesignPatterns/FactoryMethodDesignPattern/Mali.jpg' align='left' width='256' height='274'>";
		return $this->mfgProduct;
	}
}