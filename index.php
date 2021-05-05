<?php // index.php
		session_start();
		$username = $_SESSION['varname'];
		if (isset($username)){
		}
		else {
		header("Location: login.php");
		exit();
		}
?>
<!Doctype html>
<html lang="en">
<head>
	<title>Road2Büro</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="myicon.png">
</head>
<style>
<?php include 'mystyle.css'; ?>
</style>
<body>
<div class="form">
	<form action="process.php" method="post" autocomplete="off">
		<p class="anmeldung">Eingabe</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<label>Voices:</label><br />
		<input type="text" class="input2" name="voices" id="voices"/>
		</p>
		<p>
		<label>Termine:</label><br />
		<input type="text" class="input2" name="termine" id="termine"/>
		</p>
		<p>
		<label>Datum:</label><br />
		<input type="date" class="input2"
		name="date" style="cursor:pointer;" value="<?php echo date("Y-m-d"); ?>">
		</p>
		<p>
		<input type="submit" name="löschen" class="löschen" value="Löschen" />
		<input type="submit" name="eintragen" class="button" value="Eintragen" />
		</p>
	</form>
</div>
<?php 
	$_SESSION['user'] = $username;
	require("data.php");
?>
<div class="footer">
	<div> 
		<a href="impressum.html" class="impressum">Impressum</a>
	</div>
</div>
</body>
</html>