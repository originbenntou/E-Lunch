<!-- src/components/Gacha.vue -->
<template>
    <div id="beforeGacha">
        <div class="text">ガチャガチャを選択</div>
        <div class="button">
            <button @click="start">ノーマルガチャ</button>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue';

    declare var $: any;

    (function() {
        console.log( 'jquery', $.fn.jquery );
    }());

    import DecideTheDestiney from '../js/decideTheDestiney.js';
    import Roulette from '../js/roulette.js';

    (function() {
        console.log(DecideTheDestiney, Roulette);
    }());

    export default Vue.extend({
        data() {
            return {
                aaa: "aaa",
            }
        },
        methods: {
            start(): void {
                $.ajax({
                    type: "GET",
                    url: "php/DecideTheDestiney.php"
                }).done(function (res, text, xhr) {
                    var result = xhr.responseText.split(',')[0];
                    var description = xhr.responseText.split(',')[1];
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
                        var moment = lunch[Math.floor(Math.random() * lunch.length)];

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
                            resultObj.html(result + '<span style="display: block; font-size: medium">' + description + '</span>');
                            socket.emit("client_to_server", {
                                value: result,
                                time: formatExecTime()
                            });
                        }
                    };
                    // ルーレットスタート
                    interval = setInterval(roulette, delay);
                }).fail(function (res, text, xhr) {
                    console.log(res, text, xhr);
                });
            }
        }
    });
</script>
