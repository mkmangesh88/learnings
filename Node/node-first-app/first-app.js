const http = require('http') 
const fs = require('fs');
const { parseArgs } = require('util');

let server = http.createServer((req, res) => {
    
    if( '/' === req.url ) {
        res.setHeader('Content-Type', 'text/html');
        res.write('<html><head><title>Test Page</title></head><body><h1>This is body</h1></body></html>');
    } else if( '/home' === req.url ) {
        res.setHeader('Content-Type', 'text/html');
        res.write('<html><head><title>Test Page</title></head><body><h1>This is Home Page</h1></body></html>');
    } else if( '/message' === req.url ) {
        res.setHeader('Content-Type', 'text/html');
        res.write('<html><head><title>Test Page</title></head><body><form action="/message-submit" method="POST"><input type="text" name="data"/><button type="submit">Send</button></form></body></html>');
    } else if( '/message-submit' === req.url && req.method == 'POST' ) {
        const body = [];
        req.on( 'data', (chunk) => {
            body.push( chunk );
        });

        req.on('end',() => {
            const parsedBody = Buffer.concat(body).toString();
            const message = parsedBody.split( '=' )[1];
            console.log( message );
        })

        res.statusCode = 302;
        res.setHeader( 'Location', '/home' );
    }
     else {
        res.setHeader('Content-Type', 'text/html');
        res.write('<html><head><title>Test Page</title></head><body></body></html>');
    }
    return res.end();
});

server.listen( 3000 );