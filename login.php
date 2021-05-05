<!Doctype html> <!--login.php-->
<html lang="en">
<head>
	<title>Road2Büro Login</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="myicon.png">
<style>
<?php include 'mystyle.css'; ?>
</style>
</head>
<body>

<div class="login">
	<form action="process.php" method="post" autocomplete="off">
		<p class="anmeldung">Anmeldung</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<label>Benutzer:</label><br />
		<input type="text" class="input1" name="username" id="user"/>
		</p>
		<p>
		<label>Passwort:</label><br />
		<input type="password" class="input1" name="password" id="password"/>
		</p>
		<p>
		<input type="submit" name="login" class="button" value="Login" />
		</p>
	</form>
</div>
<div class="footer">
	<div> 
		<a href="impressum.html" class="impressum">Impressum</a>
	</div>
</div>
</body>
</html>