<?php

$rand = mt_rand() / mt_getrandmax();

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
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>E-Lunch</title>
	<link rel="stylesheet" href="css/style.css">
	<!-- <script type="text/javascript" src="js/main.js"></script> -->
	<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
</head>
<body>
	<header>E-Lunch</header>
	<div class="text">今日の餌</div>
	<img src="./img/osara.png" alt="餌">
	<div id="map"></div>
	<script>
		var map;
		var service;
        var infowindow;
        var list = [];
	
      	function initMap() {
			var pyrmont = new google.maps.LatLng(33.8639021, 130.8981866);

			map = new google.maps.Map(document.getElementById('map'), {
				center: pyrmont,
				zoom: 15
			});

			var request = {
				location: pyrmont,
				radius: '500',
				types: ['restaurant']
			};

			service = new google.maps.places.PlacesService(map);
			service.nearbySearch(request, callback);
		}

		function callback(results, status) {
			if (status == google.maps.places.PlacesServiceStatus.OK) {
				for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    list.push(place.name);
					createMarker(results[i]);
				}
            }
            var json = JSON.stringify(list);
		}

		function createMarker(place) {
			var placeLoc = place.geometry.location;
			var marker = new google.maps.Marker({
				map: map,
				position: place.geometry.location
			});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow = new google.maps.InfoWindow();
				infowindow.setContent(place.name);
				infowindow.open(map, this);
			});
		}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI8KywRZhloYIrEDGvxXe-3Je1uEGi5FI&libraries=places&callback=initMap" async defer></script>
	<div class="result">
        <?php
            $store = json_decode('<script>
            document.write(list);
            </script>');
			try {
				echo decideTheDestiny($store, $rand), PHP_EOL;
			} catch (Exception $e) {
				echo $e, PHP_EOL;;
			}
		?>
	</div>
</body>
</html>
