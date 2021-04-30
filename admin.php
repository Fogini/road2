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
<div class="form">
	<form autocomplete="off">
		<p class="anmeldung">Nils</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<div>Voices: 
		<?php 
		$username = 'nils';
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		$sql="SELECT SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Aktuelle Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Anzahl: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $username";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
		</p>
	</form>
</div>
<div class="form">
	<form autocomplete="off">
		<p class="anmeldung">David</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<div>Voices: 
		<?php 
		$username = 'david';
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		$sql="SELECT SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Aktuelle Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Anzahl: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $username";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
		</p>
	</form>
</div>
<div class="form">
	<form autocomplete="off">
		<p class="anmeldung">Lukas</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<div>Voices: 
		<?php 
		$username = 'lukas';
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		$sql="SELECT SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Aktuelle Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Anzahl: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $username";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
		</p>
	</form>
</div>
<div class="form">
	<form autocomplete="off">
		<p class="anmeldung">Theo</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<div>Voices: 
		<?php 
		$username = 'theo';
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		$sql="SELECT SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Aktuelle Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Anzahl: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $username";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
		</p>
	</form>
</div>
<div class="form">
	<form autocomplete="off">
		<p class="anmeldung">Julian</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<div>Voices: 
		<?php 
		$username = 'julian';
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		$sql="SELECT SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Aktuelle Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Anzahl: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $username";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
		</p>
	</form>
</div>
<div class="form">
	<form autocomplete="off">
		<p class="anmeldung">Malik</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<div>Voices: 
		<?php 
		$username = 'malik';
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		$sql="SELECT SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Aktuelle Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $username";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Anzahl: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $username";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
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

