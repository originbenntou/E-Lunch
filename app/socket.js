const io = require('socket.io').listen(3000);

var messages = [];
io.sockets.on('connection', function(socket) {
    io.sockets.emit('server_to_client', messages);
    socket.on('client_to_server', function(data) {
        messages.push(data);
        io.sockets.emit('server_to_client', messages);
    });
});
