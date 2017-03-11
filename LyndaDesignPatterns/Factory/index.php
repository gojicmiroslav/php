<?php

include_once('vehicle.php');

$car = Vehicle::create('car', 4);
echo $car->getType();

echo "<br/>";

$truck = Truck::create('truck', 6);
echo $truck->getType();