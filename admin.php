<!Doctype html> <!--admin.php-->
<html lang="en">
<head>
	<title>Road2Büro</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="myicon.png">
<style>
<?php include 'mystyle.css'; ?>
</style>
</head>
<body>
<?php 
		session_start();
		$admin = $_SESSION['varname'];
		if (isset($admin) && $admin == "admin"){
		}
		else {
		header("Location: login.php");
		exit();
		}
?>
<h1 class="auswertung">Auswertung</h1>
<?php 
$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');

$sql="SELECT DISTINCT name FROM data";

foreach ($pdo->query($sql) as $list) {
    $names = $list['name']; 

    $team = array($names);

    for ($x=0; $x < sizeof($team); $x++) {
        $_SESSION['user'] = $team[$x];
        require("data.php");
    }
}
$_SESSION['user'] = "team";
require("data.php");

?>
<div class="footer">
	<div> 
		<a href="impressum.html" class="impressum">Impressum</a>
	</div>
</div>
</body>
</html>