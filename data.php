<?php // data.php
		$user = $_SESSION['user']; // checks if username is set
		if (isset($user)){
			if ($user == "team") {
				$user = 'julian';
				$condition = "";
			}
			else {
				$condition = "name = '$user' AND";
			}
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
		
		$sql="SELECT MIN(date) as mindate FROM data WHERE $condition ID > 0";
        $min_date=$pdo->query($sql)->fetch();
		
		$mysql="SELECT MAX(date) as maxdate FROM data WHERE $condition ID > 0";
        $max_date=$pdo->query($mysql)->fetch();
		
		if (isset($_POST["von"])){          // sets default date and applies filter if used
			if (empty($_POST["von"])){
				$von = $min_date["mindate"];
			}
			else {
				$von = $_POST["von"];
			}
		}
		else {
			$von = $min_date["mindate"];
		}

		if (isset($_POST["bis"])){
			if (empty($_POST["bis"])){
				$bis = $max_date["maxdate"];
			}
			else {
				$bis = $_POST["bis"];
			}
		}
		else {
			$bis = $max_date["maxdate"];
		}
		
		echo ucfirst($user);
		?>
		</p>
		<p>
		<?php
		echo date('j. M Y', strtotime($von)) . " bis " . date('j. M Y', strtotime($bis));  // echo date von bis
		?>
		</p>

		<div>

		<div>
		<label>Von:</label>                                                                
		<input type="date" style="cursor:pointer;" value="<?php echo date("Y-m-01"); ?>" name="von"/>
		</div>

		<div>
		<label>Bis:</label>                                     
		<input type="date" style="cursor:pointer; margin-left: 8.5px;" value="<?php echo date("Y-m-d"); ?>" name="bis">
		</div>
		<div>
		<input type="submit" name="filter" class="filter" value="Filter" />
		</div>
		</div>

		<p>

		<div class="br">Voices: 
		<?php 		
		$sql="SELECT SUM(voices) AS summe FROM data WHERE $condition date BETWEEN '$von' AND '$bis'";
        $sum_voices=$pdo->query($sql)->fetch();
        echo $sum_voices["summe"];
		?>
		</div>

		<div class="br">Termine: 
		<?php 
		$sql="SELECT SUM(termine) AS summe FROM data WHERE $condition date BETWEEN '$von' AND '$bis'";
        $sum_termine=$pdo->query($sql)->fetch();
        echo $sum_termine["summe"];
		?>
		</div>

		<div class="br">Quote: 
		<?php 
		$sql="SELECT SUM(termine) / SUM(voices) AS quote FROM data WHERE $condition date BETWEEN '$von' AND '$bis'";
        $quote=$pdo->query($sql)->fetch();	
        echo round($quote["quote"], 4) * 100 . "%";
		?>
		</div>

		<div class="br">Einträge: 
		<?php 
		$sql="SELECT Count(ID) AS summe FROM data WHERE $condition date BETWEEN '$von' AND '$bis'";
		$count_einträge=$pdo->query($sql)->fetch();
		echo $count_einträge["summe"];
		?>
		</div>

        <?php require_once("bar.php");?>

			<div class="br">Voice Ziel:</div>
			  <div class="progress">
				<div 	class="progress-bar" role="progressbar" 
						aria-valuenow="<?php value('voices', $condition);?>" 
						aria-valuemin="0" 
						aria-valuemax="100" 
						style="width:<?php value('voices', $condition);?>%;background-color:<?php compare_quotas('voices', $condition);?>">
				  <?php value('voices', $condition);?>% 
				</div>
			  </div>
            <div class="br">Termin Ziel:</div>
			  <div class="progress">
				<div 	class="progress-bar" role="progressbar" 
						aria-valuenow="<?php value('termine', $condition);?>" 
						aria-valuemin="0" 
						aria-valuemax="100" 
						style="width:<?php value('termine', $condition);?>%;background-color:<?php compare_quotas('termine', $condition);?>">
				  <?php value('termine', $condition);?>% 
				</div>
			  </div>

	</form>
</div>