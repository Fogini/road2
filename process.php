<?php
$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');

if(array_key_exists('löschen', $_POST)) {
	löschen();
        }
else if(array_key_exists('eintragen', $_POST)) {
	eintragen();
        }
else if(array_key_exists('login', $_POST)) {
	login();
        }

function login() {
	
	$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
	
	if (isset($_POST["username"])){
	$username = htmlspecialchars(stripslashes(trim($_POST["username"])));
	}
	else {
		$username = "";
	}

	if (isset($_POST["password"])){
		$password = htmlspecialchars(stripslashes(trim($_POST["password"])));
	}
	else {
		$password = "";
	}

	$sql = "SELECT * FROM user where username = '$username'";
	$hash = $pdo->query($sql)->fetch(); 

	if (empty($hash['username'])){
		header("Location: 404.php");
		exit();
	}
	else if (password_verify($password, $hash['password'])) {
		session_start();
		$_SESSION['varname'] = $username;
		if ($hash['username'] == "admin") {
			header("Location: admin.php");
			exit();
		}
		else {
		header("Location: index.php");
		exit();
		}
	} 
	else {
		header("Location: 404.php");
		exit();
	}
}

function löschen() {
	
	$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
	session_start();
	$username = $_SESSION['varname'];
	$date = $_POST["date"];
	
	if (empty($date)) {
		$statement = $pdo->prepare("DELETE FROM $username WHERE ID in(SELECT MAX(ID) FROM $username)");
		$statement->execute(array());
	}
	else {
		$statement = $pdo->prepare("DELETE FROM $username WHERE date = '$date'");
		$statement->execute(array());
	}
	header("Location: index.php");
	exit();
}

function eintragen() {

	$voices = $_POST["voices"];
	$termine = $_POST["termine"];
	$date = $_POST["date"];
	session_start();
	$username = $_SESSION['varname'];
	
	$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
	$sql = "SELECT voices FROM $username where date = '$date'";
	$used_date = $pdo->query($sql)->fetch();

	if (empty($used_date)) {
		if (empty($date)) {
			header("Location: index.php");
			exit();
		}
		else {
			$statement = $pdo->prepare("INSERT INTO $username (voices, termine, date) VALUES (:voices, :termine, :date)");
			$statement->execute(array('voices' => $voices, 'termine' => $termine, 'date' => $date)); 
		}
	}
	header("Location: index.php");
	exit();
}
?>