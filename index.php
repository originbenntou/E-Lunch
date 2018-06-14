<?php

require_once(dirname(__FILE__) . '/json.php');

$store = (new ELLunchList())->getNormalList();

$rand = mt_rand() / mt_getrandmax();

function decideTheDestiny($store, $rand) {
	static $probability = 0;
	foreach ($store as $name => $value) {
		$probability += $value;
		if ($rand <= $probability) {
			return $name;
		}
	}
	throw new Exception("管理者に報告してください");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>E-Lunch</title>
	<link rel="stylesheet" href="css/style.css">
	<!-- <script type="text/javascript" src="js/main.js"></script> -->
	<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
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
		<button onclick="location.replace('/search.php');">近場のランチ</button>
	</div>
</body>
</html>
