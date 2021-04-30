<?php 
		$user = $_SESSION['tier'];
		if (isset($user)){
		}
		else {
		header("Location: 404.php");
		exit();
		}
?>
<div class="form">
	<form autocomplete="off">
		<p class="anmeldung"><?php 

        echo ucfirst($user);
		?>
		</p>
		<p>
		<img class="icon" src="myicon.png" style="object-fit:cover; width:26px; height:26px;">Road2Büro
		</p>
		<p>
		<div>Voices: 
		<?php 		
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		$sql="SELECT SUM(voices) AS summe FROM $user";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $user";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Aktuelle Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $user";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		</p>
		<p>
		<div>Anzahl: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $user";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
		</p>
	</form>
</div>

