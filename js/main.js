function success(position) {
    var latitude = position.coords.latitude,
     longitude = position.coords.longitude;

    const request = new XMLHttpRequest(),
     url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?",
     radius = 1000,
     type = "restaurant",
     apiKey = "AIzaSyDI8KywRZhloYIrEDGvxXe-3Je1uEGi5FI";

    request.open("GET", "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=33.8639021,130.8981866&radius=50000&type=restaurant&key=AIzaSyDI8KywRZhloYIrEDGvxXe-3Je1uEGi5FI");
    request.addEventListener("load", (event) => {
        console.log("dgdaga");
        console.log(event);
    });
    request.send();
};

function error(err) {
    alert("位置情報を取得できません");
    console.log(err);
};


var options = {
    enableHighAccuracy: true,
    timeout: 500,
    maximumAge: 0
};

navigator.geolocation.getCurrentPosition(success, error, options);
