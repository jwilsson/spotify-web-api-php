# Automatically Refreshing Access Token

As of version `X.Y.Z` it's possible to automatically refresh the access token when it expires.

# First time
```php
$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

// When setting a complete Session instance, it's not necessary to set the access token. It'll be automatically fetched from the Session instance
$api->setSession($session);
$api->setOptions([
    'auto_refresh' => true,
]);

// Call the API
$api->me();

// Remember to fetch the tokens afterwards, they might have been updated
$newAccessToken = $session->getAccessToken();
$newRefreshToken = $session->getRefreshToken(); // Sometimes, a new refresh token will be returned
```

## With an existing refresh token
```php
// Use previously requested tokens fetched from somewhere. A database for example.
if ($accessToken) {
    $session->setAccessToken($accessToken);
    $session->setRefreshToken($refreshToken);
} else {
    // Or request a new access token
    $session->refreshAccessToken($refreshToken);
}

$api->setSession($session);

// Call the API
$api->me();

// Remember to fetch the tokens afterwards, they might have been updated
$newAccessToken = $session->getAccessToken();
$newRefreshToken = $session->getRefreshToken(); // Sometimes, a new refresh token will be returned
```
