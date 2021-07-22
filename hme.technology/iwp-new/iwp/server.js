const express = require('express')
const app = express()
const http = require('http').Server(app)
const fs = require('fs')
const https = require('https')
//const io = require('socket.io')(http)
const port = process.env.PORT || 8080

app.use(express.static(__dirname + "/public"))

var https_serv = https.Server({
                key: fs.readFileSync('/etc/letsencrypt/live/hme.technology/privkey.pem'),
                cert: fs.readFileSync('/etc/letsencrypt/live/hme.technology/cert.pem'),
                ca: fs.readFileSync('/etc/letsencrypt/live/hme.technology/chain.pem'),
                requestCert: false,
                rejectUnauthorized: false
                },app);


const io = require('socket.io')(https_serv)

io.on('connection', function (socket) {
    socket.on("NewClient", function (data) {
        data = JSON.parse(data)
        room = data["channel_id"]
        this.emit(getNumberofParticipants(room))
        if (getNumberofParticipants(room) < 2) {
            if (getNumberofParticipants(room) == 1) {
                this.emit('CreatePeer')
                this.room_id = room
            }
            socket.join(room);
        }
        else
            this.emit('SessionActive')
    })
    socket.on('Offer', SendOffer)
    socket.on('Answer', SendAnswer)
    socket.on('disconnect', Disconnect)
})

function Disconnect() {
    if (getNumberofParticipants(this.room_id )> 0) {
        if (getNumberofParticipants(this.room_id ) <= 2)
        this.broadcast.to(this.room_id).broadcast.emit("Disconnect");
        //getNumberofParticipants(this.room_id) = getNumberofParticipants(this.room_id)-1
    }
}

function SendOffer(offer) {
    offer = JSON.parse(offer)
    channel_id = offer["channel_id"]
    offer = offer["data"]
    //this.broadcast.emit("BackOffer", offer)
    this.broadcast.to(channel_id).broadcast.emit("BackOffer",offer);
}

function SendAnswer(data) {
    data = JSON.parse(data)
    channel_id = data["channel_id"]
    data = data["data"]
    //this.broadcast.emit("BackAnswer", data)
    this.broadcast.to(channel_id).broadcast.emit("BackAnswer",data);
}

function subscribe(data){
    data = JSON.parse(data)
    io.socket.join(data["channel_id"]);
}

function getNumberofParticipants(room_id){
    if (io.sockets.adapter.rooms[room_id]) {
        return io.sockets.adapter.rooms[room_id].length;
    }
    else{
        return 0;
    }
}

https_serv.listen(port, () => console.log(`Active on ${port} port`))



