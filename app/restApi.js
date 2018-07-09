'use strict';

// json(string)をレスポンスするREST APIサーバを立ち上げる
const http = require('http'),
    server = http.createServer();

server.on('request', function(req, res) {
    res.writeHead(200, {'Content-Type': 'application/json'});
    res.end(JSON.stringify({'value':'hogehoge'}));
});

server.listen(8080);

function restApi() {
    // 別にAPIにしないでよかった....けど、勉強できたので残しておこう！！
}
