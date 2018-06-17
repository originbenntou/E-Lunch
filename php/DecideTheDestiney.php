<?php

$rand = mt_rand() / mt_getrandmax();

if (is_null($_POST["store"])) {
	require_once(dirname(__FILE__) . '/../json.php');

	$store = (new ELLunchList())->getNormalList();

} else {
	$store = $_POST["store"];

	$ratio = [];
	$ratio = array_pad($ratio, 20, 0.05);
	$combine = array_combine($store, $ratio);

	echo decideTheDestiny($combine, $rand);
}

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
