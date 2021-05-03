
<?php
			function value($benutzer) {
				$pdo = new PDO('mysql:host=sql106.epizy.com;dbname=epiz_28415679_road2', 'epiz_28415679', 'CQVWIDJVUA');
				$current_month = date("F");
				$start_date = date('Y-m-01');
				$end_date = date ('Y-m-t');
				$user = $benutzer;
							
					$sql="SELECT * FROM goals WHERE month = '$current_month'";
					$goal=$pdo->query($sql)->fetch();
							
					$mysql="SELECT SUM(voices) AS summe FROM $user WHERE date BETWEEN '$start_date' AND '$end_date'";
					$sum_voices=$pdo->query($mysql)->fetch();
					
					echo round($sum_voices["summe"] / $goal[$user] * 100, 2);
			}

			function quote($benutzer) {
				$pdo = new PDO('mysql:host=sql106.epizy.com;dbname=epiz_28415679_road2', 'epiz_28415679', 'CQVWIDJVUA');
				$current_month = date("F");
				$start_date = date('Y-m-01');
				$end_date = date ('Y-m-t');
				$month_days = date ('t');
				$user = $benutzer;
				
				$sql="SELECT * FROM goals WHERE month = '$current_month'";
				$goal=$pdo->query($sql)->fetch();
				
				$mysql="SELECT AVG(voices) AS average FROM $user WHERE date BETWEEN '$start_date' AND '$end_date'";
				$avg_voices=$pdo->query($mysql)->fetch();
				
				$quote_goal = $goal[$user] / $month_days;
				
				if ($quote_goal > $avg_voices["average"]) {
					echo "#d9534f"; //rot
				}
				else {
					echo "#5cb85c"; //grün
				}
				
			}
			?>

