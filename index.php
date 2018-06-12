<?php

define('NORMAL_PROBABILITY', 1 / 13);

$store = [
	'あがの' 				=> NORMAL_PROBABILITY,
	'とろろ' 				=> NORMAL_PROBABILITY,
	'いづも' 				=> NORMAL_PROBABILITY,
	'丸亀' 					=> NORMAL_PROBABILITY,
	'さんさん' 				=> NORMAL_PROBABILITY,
	'美魔女' 				=> NORMAL_PROBABILITY,
	'500円カレー' 			=> NORMAL_PROBABILITY,
	'ナンおかわり自由カレー' 	=> NORMAL_PROBABILITY,
	'おしゃれパスタジャポネ' 	=> NORMAL_PROBABILITY,
	'ハンバーグ' 				=> NORMAL_PROBABILITY,
	'藤王' 					=> NORMAL_PROBABILITY,
	'いずもそばの上にある謎屋' 	=> NORMAL_PROBABILITY,
	'くいだおれ' 				=> NORMAL_PROBABILITY,
];

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


<header>E-Lunch</header>
<div class="text">今日の餌</div>
<img src="./img/esa.jpg" alt="餌">
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

<style type="text/css">
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	header {
		width: 100%;
		height: 50px;
		background-color: #e60012;
		text-align: center;
		color: #fff;
		font-size: 30px;
		line-height: 50px;
	}

	.text {
		font-size: 40px;
		text-align: center;
		margin: 50px;
	}

	img {
		margin: auto;
		display: block;
	}

	.result {
		font-size: 50px;
		text-align: center;
		text-shadow: 0 1px rgba(0,0,0,1);
		color: #e60012;
		position: relative;
		top: -200px;
	}

	.reload {
		text-align: center;
	}

	.reload button{
		font-size: 1.4em;
		font-weight: bold;
		padding: 10px 30px;
	}
</style>