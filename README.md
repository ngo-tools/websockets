# NGO.Tools Websockets

- Receive tenants via NGO.Tools API
- Start websocket server (Reverb)
  - Each tenant is an indivdual app

## Installation

1. `git@github.com:ngo-tools/websockets.git`
2. `php artisan migrate` to generate the SQLite database in `database/database.sqlite`

After running `php artisan ngo:fresh` a token is generated.
This token has to be placed in `.env` => `NGO_TOOLS_WEBSOCKET_APPS_API_KEY`
(This token has to be updated anytime `ngo:fresh` is run.)

Afterwards the server can be started with `php artisan reverb:start`.
