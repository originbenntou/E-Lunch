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
<div class="button">
	<button onclick="window.location.reload();">再試行</button>
</div>
<div class="button">
	<button onclick="location.replace('/index');">戻る</button>
</div>
<script>
	$.ajax({
		type: "GET",
		url: "php/DecideTheDestiney.php"
	}).done(function (res, text, xhr) {
		let count = 0;
		let delay = 100;
		let interval, interval2, interval3, interval4, interval5;

		$.getJSON("data/lunch.json", function (object) {
			let roulette = function() {
				moment = object[Math.floor(Math.random() * object.length)];

				let resultObj = $(".result");
				console.log(resultObj, moment);
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
					interval5 = setInterval(roulette, 1800);
				}

				if (count === 32) {
					clearTimeout(interval5);
					$(".decision").removeClass("hidden");
					$(".reload").addClass("hidden");
					// TODO: DirectionAPIで再実装
					resultObj.html(xhr.responseText);
				}
			};
			// ルーレットスタート
			interval = setInterval(roulette, delay);
		});
	}).fail(function (res, text, xhr) {
		// TODO: エラー処理
		console.log(res, text, xhr);
	});
</script>
</body>
</html>
