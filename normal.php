<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>E-Lunch ノーマルガチャ</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<header>E-Lunch</header>
<div class="text">今日の餌</div>
<img src="./img/osara.png" alt="餌">
<div class="result"></div>
<div class="decision hidden"><img src="img/pop_kettei.png"></div>
<div class="button start">
	<button onclick="startRoulette()">スタート</button>
</div>
<div class="button reload">
	<button onclick="window.location.reload();">再試行</button>
</div>
<div class="button back">
	<button onclick="location.replace('/index');">戻る</button>
</div>
<script>
	var wsInfo = new WebSocket('ws://localhost:8080');

	// TODO: ユーザ判定実装
	var cookie;
	wsInfo.onmessage = function (event) {
		cookie = event.data;
	};

	$(".reload").addClass("hidden");

	var startRoulette = function () {
		$(".start").addClass("hidden");
		$(".reload").removeClass("hidden");

		/* ユーザ実装時、JSONでデータを取り扱う参考コード
		var msg = {
			type: "message",
			text: "ルーレットが開始されました",
			cookie: cookie,
			date: Date.now()
		};
		wsInfo.send(JSON.stringify(msg));
		*/

		wsInfo.send("ルーレットが開始されました");

		$.ajax({
			type: "GET",
			url: "php/DecideTheDestiney.php"
		}).done(function (res, text, xhr) {
			var result = xhr.responseText;
			let count = 0;
			let delay = 100;
			let interval, interval2, interval3, interval4, interval5;

			var lunch = [];

			$.getJSON("data/lunch.json", function (data) {
				data.forEach(function (value) {
					lunch.push(value.name);
				});
			});

			let roulette = function() {
				moment = lunch[Math.floor(Math.random() * lunch.length)];

				let resultObj = $(".result");
				resultObj.html(moment);
				count++;
				if (count === 20) {
					clearTimeout(interval);
					interval2 = setInterval(roulette, 200);
				}

				if (count === 27) {
					clearTimeout(interval2);
					interval3 = setInterval(roulette, 800);
				}

				if (count === 29) {
					clearTimeout(interval3);
					interval4 = setInterval(roulette, 1200);
				}

				if (count === 31) {
					clearTimeout(interval4);
					$(".decision").removeClass("hidden");
					$(".reload").addClass("hidden");
					// TODO: DirectionAPIで再実装
					resultObj.html(result);
					wsInfo.send(`本日のランチは「${result}」です`);
				}
			};
			// ルーレットスタート
			interval = setInterval(roulette, delay);
		}).fail(function (res, text, xhr) {
			// TODO: エラー処理
			console.log(res, text, xhr);
		});
	}
</script>
</body>
</html>
