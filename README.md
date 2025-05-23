# NGO.Tools Websockets

- Receive tenants via NGO.Tools API
- Start websocket server (Reverb)
  - Each tenant is an indivdual app

## Installation

1. `git clone git@github.com:ngo-tools/websockets.git`
2. `php artisan migrate` to generate the SQLite database in `database/database.sqlite`
3. (If you're not using something like Laravel Herd that automatically takes care of SSL certificates:) Create a SSL certificate for local development using [mkcert](https://mkcert.dev)
```
mkcert ngotools-websockets.test
```
4. Setup environment in `.env`
   - Fill `NGO_TOOLS_WEBSOCKET_APPS_API_KEY` by running `php artisan ngo:fresh` in [NGO.Tools](https://github.com/nanuc/enchio3) and copying the token printed at the end. (This token has to be updated anytime `ngo:fresh` is run.)
   - Edit REVERB_SSL_LOCAL_CERT and REVERB_SSL_LOCAL_PK to point to the certificate files created with mkcert

5. Edit `/etc/hosts` and add `127.0.0.1 ngotools-websockets.test ngo-websockets.test` (TODO: why two different domain names? See `.env.example` in main repo)
6. Run the server
```
php artisan reverb:start
```

## Debugging
If SSL is correctly set up, you should see the following on startup:
```
   INFO  Starting secure server on 0.0.0.0:8080 (ngotools-websockets.test).
```
(otherwise it says `INFO Starting server ...`)

To see every connection that clients make to this websocket server run
```
php artisan reverb:start --debug
```
If a client correctly connects to this websockets server you should start seeing debug output like
```
  Connection Established ....................................................................................................... 238268145.785474342
  Message Received ............................................................................................................. 238268145.785474342

   1▕ {
   2▕     "event": "pusher:subscribe",
   3▕     "data": {
...
```

When opening your [NGO.Tools local development environment](https://demo.ngo.test), go to the developer tools to network -> websockets and you should see the connections.

If this fails you can also try to debug things in the console with [wscat](https://github.com/websockets/wscat):

If the server is not secured:
```
wscat -c ws://ngotools-websockets.test:8080
```

If you could successfully start the secure server:
```
wscat -c wss://ngotools-websockets.test:8080
```