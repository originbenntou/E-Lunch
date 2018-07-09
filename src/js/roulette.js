module.exports = class Roulette
{
    start(list, result, element) {
        let count = 0,
            delay = 100;
        let interval, interval2, interval3, interval4;

        let roulette = function() {

            var moment = list[Math.floor(Math.random() * list.length)];

            element.html(moment);
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
                element.html(result);
            }
        };

        // ルーレットスタート
        interval = setInterval(roulette, delay);
    }
}
