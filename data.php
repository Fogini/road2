<?php 
		$user = $_SESSION['user'];
		if (isset($user)){
		}
		else {
		header("Location: 404.php");
		exit();
		}
?>
<div class="form">
	<form method="post" autocomplete="off">
		<p class="anmeldung"><?php 
		
		$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
		
		$sql="SELECT MIN(date) as mindate FROM $user";
        $result=$pdo->query($sql)->fetch();
		
		$mysql="SELECT MAX(date) as maxdate FROM $user";
        $max_date=$pdo->query($mysql)->fetch();
		
		
		if (isset($_POST["von"])){
			if (empty($_POST["von"])){
				$von = $result["mindate"];
			}
			else {
				$von = $_POST["von"];
			}
		}
		else {
			$von = $result["mindate"];
		}

		if (isset($_POST["bis"])){
			if (empty($_POST["bis"])){
				$bis = date("m/d/Y");
			}
			else {
				$bis = $_POST["bis"];
			}
		}
		else {
			$bis = $max_date["maxdate"];
		}
		
		if ($von > $bis) {
			echo "greater";
			$von = $result["mindate"];
			$bis = $max_date["maxdate"];
		}
		
		echo ucfirst($user);
		?>
		</p>
		<p>
		<?php
		echo date('j. M Y', strtotime($von)) . " bis " . date('j. M Y', strtotime($bis));
		?>
		</p>
		<div>
		<div>
		<label>Von:</label>
		<input type="text"
		name="von"
        onfocus="(this.type='date')"
        onblur="(this.type='text')"/>
		</div>
		<div>
		<label style="margin-right:8.5px">Bis:</label>
		<input type="text" id="datum"
		name="bis"
        onfocus="(this.type='date')"
        onblur="(this.type='text')"/>
		</div>
		<div>
		<input type="submit" name="filter" class="filter" value="Filter" />
		</div>
		</div>
		<p>
		<div class="br">Voices: 
		<?php 		
		$sql="SELECT SUM(voices) AS summe FROM $user WHERE date BETWEEN '$von' AND '$bis'";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		<div class="br">Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM $user WHERE date BETWEEN '$von' AND '$bis'";
        $result=$pdo->query($sql)->fetch();
		
        echo $result["summe"];
		?>
		</div>
		<div class="br">Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS summe FROM $user WHERE date BETWEEN '$von' AND '$bis'";
        $result=$pdo->query($sql)->fetch();
		
        echo round($result["summe"], 2);
		?>
		</div>
		<div class="br">Einräge: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM $user WHERE date BETWEEN '$von' AND '$bis'";
		$result=$pdo->query($sql)->fetch();
		
		echo $result["summe"];
		?>
		</div>
		<?php require_once("bar.php"); ?>
			<div class="br">Fortschritt:</div>
			  <div class="progress">
				<div 	class="progress-bar" role="progressbar" 
						aria-valuenow="<?php value($user);?>" 
						aria-valuemin="0" 
						aria-valuemax="100" 
						style="width:<?php value($user);?>%;background-color:<?php quote($user);?>">
				  <?php value($user);?>% 
				</div>
			  </div>
	</form>
</div>
<script>
  var heute = new Date();
  var date = heute.getFullYear()+'-'+(heute.getMonth()+1)+'-'+heute.getDate();
  document.getElementById("datum").value = date;
</script>

