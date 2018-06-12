<?php
class ELLunchList
{
	/*
	 * ピックアップを指定するとノーマルの確率は自動で設定されます
	 * $pickup_ratio * ピックアップの個数が100を超えてないようにしてください
	*/
	public $pickup_ratio = 0.5;

	public function getNormalList()
	{
		$json_decoded = $this->_getDecodedJson();
		$store = [];
		foreach ($json_decoded as $item) {
			$store[$item['name']] = 1 / count($json_decoded);
		}
		return $store;
	}

	public function getPickupList($pickup)
	{
		$json_decoded = $this->_getDecodedJson();
		$store = [];
		foreach ($json_decoded as $item) {
			if (in_array($item['name'], $pickup)) {
				$store[$item['name']] = $this->pickup_ratio;
			} else {
				$store[$item['name']] = (1 - $this->pickup_ratio * count($pickup)) / (count($json_decoded) - count($pickup));
			}
		}
		return $store;
	}

	private function _getDecodedJson()
	{
		$json = file_get_contents('data/lunch.json');
		return json_decode($json, true);
	}
}

