<?php // process.php
$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
session_start();

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
	$username = strtolower(htmlspecialchars(stripslashes(trim($_POST["username"]))));
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
	$login_data = $pdo->query($sql)->fetch(); 

	if (empty($login_data['username'])){
		header("Location: 404.php");
		exit();
	}
	else if (password_verify($password, $login_data['password'])) {
		session_start();
		$_SESSION['varname'] = $username;
		if ($login_data['username'] == "admin") {
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
	$username = $_SESSION['varname'];
	$date = $_POST["date"];
	
	if (empty($date)) {
		$deleted_data = $pdo->prepare("DELETE FROM data WHERE ID in(SELECT MAX(ID) FROM $username) AND name = '$username'");
		$deleted_data->execute(array());
	}
	else {
		$deleted_data = $pdo->prepare("DELETE FROM data WHERE date = '$date' AND name = '$username'");
		$deleted_data->execute(array());
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
	$sql = "SELECT voices FROM data where date = '$date' AND name = '$username'";
	$used_date = $pdo->query($sql)->fetch();

	if (empty($used_date)) {
		if (empty($date)) {
		}
		else {
			$insert_data = $pdo->prepare("INSERT INTO data (name, voices, termine, date) VALUES (:name, :voices, :termine, :date)");
			$insert_data->execute(array('name' => $username, 'voices' => $voices, 'termine' => $termine, 'date' => $date)); 
		}
	}
	header("Location: index.php");
	exit();
}
?>