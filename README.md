# NGO.Tools Websockets

- Receive tenants via NGO.Tools API
- Start websocket server (Reverb)
  - Each tenant is an indivdual app

## Installation

1. `git clone git@github.com:ngo-tools/websockets.git`
2. `php artisan migrate` to generate the SQLite database in `database/database.sqlite`
3. Setup environment in `.env`
   - Fill `NGO_TOOLS_WEBSOCKET_APPS_API_KEY` by running `php artisan ngo:fresh` in [NGO.Tools](https://github.com/nanuc/enchio3) and copying the token printed at the end. (This token has to be updated anytime `ngo:fresh` is run.)
4. Run the server
```
php artisan reverb:start
```
