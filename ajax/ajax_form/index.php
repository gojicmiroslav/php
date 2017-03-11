<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajax Form</title>

	<style>
		#result {
			display: none;
		}
	</style>
</head>
<body>

<div id="measurements">
	<p>Enter measurements below to determine the total volume.</p>

	<form id="measurements-form" action="/ajax_form/process_measurements.php" method="POST">
		Length: <input type="text" name="length"><br /><br />
		Width: <input type="text" name="width"><br /><br />
		Height: <input type="text" name="heright"><br /><br />

		<input type="submit" value="Submit" id="html-submit">
		<input type="button" value="Ajax Submit" id="ajax-submit">
	</form>
</div>

<div id="result">
	<p>The total volume is: <span id="volume"></span></p>
</div>

<script>
	
var resultDiv = document.getElementById("result");
var volume = document.getElementById("volume");

function setResult(value){
	volume.innerHTML = value;
	resultDiv.style.display = "block";
}

function clearResult(){
	volume.innerHTML = '';
	resultDiv.style.display = "none";	
}

function calculateMeasurements(){
	clearResult();

	var form = document.getElementById("measurements-form");

	//determine form action
	var action = form.getAttribute("action");

	//gather form data

	var xhr = new XMLHttpRequest();
	xhr.open('POST', action, true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			var result = xhr.responseText;
			console.log(result);

			postResult(result);
		}
	}

	xhr.send(form_data);
}

var button = document.getElementById("ajax-submit");
button.addEventListener("click", calculateMeasurements);

</script>

</body>
</html>