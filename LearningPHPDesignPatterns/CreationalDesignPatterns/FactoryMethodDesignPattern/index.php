<?php

include_once('GraphicFactory.php');
include_once('TextFactory.php');

class Client
{
	private $graphicObject;
	private $textObject;

	public function __construct()
	{
		$this->graphicObject = new GraphicFactory();
		$this->textObject = new TextFactory();

		echo $this->graphicObject->startFactory();
		echo $this->textObject->startFactory();
	}
}

$client = new Client();