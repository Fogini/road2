<?php //bar.php

			function value($type, $condition) {
				$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
				$current_month = date("F");
				$start_date = date('Y-m-01');
				$end_date = date ('Y-m-t');
							
					$sql="SELECT sum($type) as $type FROM goals WHERE $condition month = '$current_month'";
					$goal=$pdo->query($sql)->fetch();
							
					$mysql="SELECT SUM($type) AS summe FROM data WHERE $condition date BETWEEN '$start_date' AND '$end_date'";
					$sum=$pdo->query($mysql)->fetch();
					
					echo round($sum["summe"] / $goal[$type] * 100, 2);
			}

			function compare_quotas($type, $condition) {
				$pdo = new PDO('mysql:host=localhost;dbname=road2', 'root', 'pumpkin');
				$current_month = date("F");
				$start_date = date('Y-m-01');
				$end_date = date ('Y-m-t');
				$month_days = date ('t');
				
				$sql="SELECT sum($type) as $type FROM goals WHERE $condition month = '$current_month'";
				$goal=$pdo->query($sql)->fetch();
				
				$mysql="SELECT SUM($type) AS summe FROM data WHERE $condition date BETWEEN '$start_date' AND '$end_date'";
				$sum=$pdo->query($mysql)->fetch();
				
				$goal_quote = $goal[$type] / $month_days;
                $current_quote = $sum["summe"] / (date('j')-1);
				
				if ($goal_quote >  $current_quote) {
					echo "#d9534f"; //rot                   
				}
				else {
					echo "#5cb85c"; //grün
				}	
			}
?>