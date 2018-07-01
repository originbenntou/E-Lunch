<?php

$rand = mt_rand() / mt_getrandmax();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	require_once(dirname(__FILE__) . '/../json.php');

	$store = (new ELLunchList())->getNormalList();

	$result = decideTheDestiny($store, $rand);

	$registerd = (new ELLunchList())->getExamList();

	foreach ($registerd as $num => $array) {
		if ($array["name"] == $result) {
			echo $registerd[$num]["name"] . "," . $registerd[$num]["description"];
		}
	}
} else {
	// 登録済み店情報と検索結果の店情報を結合する
	require_once(dirname(__FILE__) . '/../json.php');
	$registerd = (new ELLunchList())->getExamList();
	$posted    = $_POST["store"];

	$merged = array_merge($registerd, $posted);

	// ガチャガチャ処理に渡す用の店の名前と確率のデータを作成
	foreach ($merged as $key => $value) {
		$nameList[] = $value["name"];
	}

	$count = count($nameList);
	$ratio = [];
	$ratio = array_pad($ratio, $count, 1 / $count);

	$store = array_combine($nameList, $ratio);

	echo decideTheDestiny($store, $rand);
}

// ガチャガチャ処理
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
