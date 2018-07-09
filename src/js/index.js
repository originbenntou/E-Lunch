var $ = require('jquery');

var html = require('./static.html');
const element = $(".result");

const DecideTheDestiney = require('./decideTheDestiney.js'),
    Roulette            = require('./roulette.js');

var destiney = new DecideTheDestiney;
var roulette = new Roulette;

destiney.doGacha().then((arr) => {
    roulette.start(arr[0], arr[1], element);
});
