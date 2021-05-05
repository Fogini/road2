<?php //bar.php

			function value($user, $type) {
				$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
				$current_month = date("F");
				$start_date = date('Y-m-01');
				$end_date = date ('Y-m-t');
							
					$sql="SELECT * FROM goals WHERE month = '$current_month' AND type = '$type'";
					$goal=$pdo->query($sql)->fetch();
							
					$mysql="SELECT SUM($type) AS summe FROM data WHERE name = '$user' AND date BETWEEN '$start_date' AND '$end_date'";
					$sum=$pdo->query($mysql)->fetch();
					
					echo round($sum["summe"] / $goal[$user] * 100, 2);
			}

			function compare_quotas($user, $type) {
				$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
				$current_month = date("F");
				$start_date = date('Y-m-01');
				$end_date = date ('Y-m-t');
				$month_days = date ('t');
				
				$sql="SELECT * FROM goals WHERE month = '$current_month' AND type = '$type'";
				$goal=$pdo->query($sql)->fetch();
				
				$mysql="SELECT SUM($type) AS summe FROM data WHERE name = '$user' AND date BETWEEN '$start_date' AND '$end_date'";
				$sum=$pdo->query($mysql)->fetch();
				
				$goal_quote = $goal[$user] / $month_days;
                $current_quote = $sum["summe"] / (date('j')-1);
				
				if ($goal_quote >  $current_quote) {
					echo "#d9534f"; //rot                   
				}
				else {
					echo "#5cb85c"; //grün
				}	
			}
?>