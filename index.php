<!Doctype html>
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
<html lang="en">
<head>
	<title>Road2Büro</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="myicon.png">
</head>
<body>
<div class="form">
	<form action="process.php" method="post" autocomplete="off">
		<p class="anmeldung">Eingabe</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<label>Voices:</label><br />
		<input type="text" name="voices" id="voices"/>
		</p>
		<p>
		<label>Termine:</label><br />
		<input type="text" name="termine" id="termine"/>
		</p>
		<p>
		<label>Datum:</label><br />
		<input type="text" id="date"
		name="date"
        onfocus="(this.type='date')"
        onblur="(this.type='text')"/>
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
<script>
  var today = new Date();
  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
  document.getElementById("date").value = date;
</script>
<div class="footer">
	<div> 
		<a href="impressum.html" class="impressum">Impressum</a>
	</div>
</div>
</body>
</html>

