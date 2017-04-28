# Authorization Using the Client Credentials Flow

All API methods require authorization. Before using these methods you'll need to create an app at [Spotify's developer site](https://developer.spotify.com/web-api/).

This method doesn't require any user interaction and no access to user information are therefore granted. This is the recommended method if you only need access to Spotify catalog data.

```php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'REDIRECT_URI'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

// Set the code on the API wrapper
$api->setAccessToken($accessToken);

// The API can now be used!
```

For more in-depth technical information, see the [Spotify Web API documentation](https://developer.spotify.com/web-api/authorization-guide/#client_credentials_flow).
