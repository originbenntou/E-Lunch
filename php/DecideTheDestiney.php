<?php

$rand = mt_rand() / mt_getrandmax();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	require_once(dirname(__FILE__) . '/../json.php');

	$store = (new ELLunchList())->getNormalList();

} else {
	$posted = $_POST["store"];

	$ratio = [];
	$ratio = array_pad($ratio, 20, 0.05);
	$store = array_combine($posted, $ratio);
}

echo decideTheDestiny($store, $rand);

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
