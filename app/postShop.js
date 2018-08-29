const express = require('express');
const bodyParser = require('body-parser');

const fs = require('fs');

const app = express();

// urlencodedとjsonは別々に初期化する
app.use(bodyParser.urlencoded({
    extended: true
}));
app.use(bodyParser.json());

app.listen(8080);
console.log('Server is online.');

app.post('/post', function(req, res) {

    fs.writeFile('./public/data/lunch.json', req.body.list, function (err) {
    });

    res.header('Access-Control-Allow-Origin', '*');
    res.send('POST request to the homepage');
})
