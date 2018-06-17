<?php

require_once(dirname(__FILE__) . '/php/DecideTheDestiney.php');

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>E-Lunch</title>
	<link rel="stylesheet" href="css/style.css">
	<!-- <script type="text/javascript" src="js/main.js"></script> -->
</head>
<body>
	<header>E-Lunch</header>
	<div class="text">今日の餌</div>
	<img src="./img/osara.png" alt="餌">
	<div class="result">
		<?php
			try {
				echo decideTheDestiny($store, $rand), PHP_EOL;
			} catch (Exception $e) {
				echo $e, PHP_EOL;;
			}
		?>
	</div>
	<div class="reload">
		<button onclick="window.location.reload();">再試行</button>
	</div>
	<div class="discover">
		<!-- SSL化 -->
		<button onclick="location.replace('https://13.115.145.47/search.html');">近場のランチ</button>
	</div>
</body>
</html>
