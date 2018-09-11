const express = require('express');
const bodyParser = require('body-parser');
const NeDB = require('nedb');

const app = express();

app.use(bodyParser.urlencoded({
    extended: true
}));
app.use(bodyParser.json());

app.listen(8080);

let db = new NeDB({
    filename: 'data/lunch.db',
    autoload: true
});

app.get('/', function(req, res) {
    res.header('Access-Control-Allow-Origin', '*');

    db.find({}, function(err, docs){
        res.send(JSON.stringify(docs));
    });
});

app.post('/', function(req, res) {
    res.header('Access-Control-Allow-Origin', '*');
    console.log(req.body.list);

    db.insert(JSON.parse(req.body.list));

    res.send('POST成功');
});
