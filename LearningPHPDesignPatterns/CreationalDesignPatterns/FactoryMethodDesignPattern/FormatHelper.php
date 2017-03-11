<?php

class FormatHelper
{
	private $topper;
	private $bottom;

	private addTop()
	{
		$this->topper = "<!doctype html><html><head>
			<link rel='stylesheet' type='text/css' href='product.css' />
			<meta charset='UTF-8'>
			<title>Map Factory</title>
			</head>
			<body>
		";

		return $this->topper;
	}

	private closeUp()
	{
		$this->bottom = "</body></html>";
		return $this->bottom;
	}
}