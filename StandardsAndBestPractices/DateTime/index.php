<?php

$date = new DateTime('2017, August 09');
$date2 = new DateTime('2017-04-31');
$date3 = new DateTime('+2 weeks'); // 2 weeks from now
$date4 = new DateTime('next week');
$date5 = new DateTime('tomorrow');

$raw = '10. 11. 1968';
$date6 = DateTime::createFromFormat('d. m. Y', $raw);

$date7 = DateTime::createFromFormat('j-M-Y', '15-Feb-2009');

?>

<p>The date is: <?php echo $date->format('m/d/y'); ?></p>
<p>The date is: <?php echo $date2->format('m/d/y'); ?></p>
<p>The date is: <?php echo $date3->format('m/d/y'); ?></p>
<p>The date is: <?php echo $date4->format('m/d/y'); ?></p>
<p>The date is: <?php echo $date5->format('m/d/y'); ?></p>
<p>The date is: <?php echo $date6->format('m/d/y'); ?></p>
<p>The date is: <?php echo $date7->format('Y-m-d'); ?></p>

<br/>

<h2>Date Comparison</h2>

<?php

$dvone = new DateTime('August 1, 1980');
$spike = new DateTime('August 13, 1978');

// who is older
if($dvone < $spike) {
	echo "<p>Dvone is older than Span</p>";
} else {
	echo "<p>Span is older than Dvone</p>";
}

// Age differrence
$diff = $dvone->diff($spike);
echo $diff->format("<p>There is %y years, and %m months and %d days between Spike and Dvon</p>");

?>