var searched = [];

// TODO: MAP初期化なしで動作するように修正
function initMap() {
    let options = {
        enableHighAccuracy: false,
        timeout: 10000,
        maximumAge: 0
    };
    
    navigator.geolocation.getCurrentPosition(success, error, options);

    function success(position) {
        let pyrmont = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        let map = new google.maps.Map(document.getElementById('map'), {
            center: pyrmont,
            zoom: 15
        });

        let service = new google.maps.places.PlacesService(map);

        let request = {
            location: pyrmont,
            radius: '500',
            types: ['restaurant']
        };

        service.nearbySearch(request, callback);

        function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (let i = 0; i < results.length; i++) {
                    searched[i] = results[i].name;
                }
                $.ajax({
                    type: "POST",
                    url: "php/DecideTheDestiney.php",
                    data: {
                        "store": searched
                    }
                }).done(function (res, text, xhr) {
                    let count = 0;
                    let delay = 100;
                    let interval, interval2, interval3, interval4, interval5;

                    let roulette = function() {
                        moment = searched[Math.floor(Math.random() * searched.length)];

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
                            interval5 = setInterval(roulette, 1800);
                        }

                        if (count === 32) {
                            clearTimeout(interval5);
                            $(".decision").removeClass("hidden");
                            $(".reload").addClass("hidden");
                            // TODO: DirectionAPIで再実装
                            resultObj.html(`<a target="_blank" href=https://www.google.co.jp/search?q="` + encodeURIComponent(xhr.responseText) + `">${xhr.responseText}</a>`);
                        }
                    };
                    // ルーレットスタート
                    interval = setInterval(roulette, delay);
                }).fail(function () {
                    //TODO: エラー処理
                });
            }
        }        
    }

    function error() {
        alert("位置情報が取得できません");
    }
}
