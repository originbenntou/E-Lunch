var ws = new WebSocket('wss://www.e-lunch.info/chat');
ws.onopen;
// コネクションに失敗した場合、エラーページ
ws.onerror = function (e) {
    location.href = '/sorry';
};

/* TODO: ユーザ判定実装
var cookie;
ws.onmessage = function (event) {
    cookie = event.data;
};
*/

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

    ws.send("ルーレットが開始されました");

    $.ajax({
        type: "GET",
        url: "php/DecideTheDestiney.php"
    }).done(function (res, text, xhr) {
        console.log(res, text, xhr);
        var result = xhr.responseText;
        let count = 0;
        let delay = 100;
        let interval, interval2, interval3, interval4;

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
                // TODO: DirectionAPIで再実装
                resultObj.html(result);
                ws.send(`本日のランチは「${result}」です`);
            }
        };
        // ルーレットスタート
        interval = setInterval(roulette, delay);
    }).fail(function (res, text, xhr) {
        // TODO: エラー処理
        console.log(res, text, xhr);
    });
}
