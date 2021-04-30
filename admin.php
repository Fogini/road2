<!Doctype html>
<html lang="en">
<head>
	<title>Road2Büro</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="myicon.png">
</head>
<body>
<?php 
		session_start();
		$username = $_SESSION['varname'];
		if (isset($username)){
		}
		else {
		header("Location: login.php");
		exit();
		}
?>
<h1 class="auswertung">Auswertung</h1>
<?php 
$test = array("david","malik","lukas","nils","theo","julian");

for ($x=0; $x < sizeof($test); $x++) {
	$_SESSION['tier'] = $test[$x];
	require("data.php");
}
?>
<div class="footer">
	<div> 
		<a href="impressum.html" class="impressum">Impressum</a>
	</div>
</div>
</body>
</html>

