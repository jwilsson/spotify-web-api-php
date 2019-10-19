# Automatically Refreshing Access Tokens

Start off with requesting an access token as usual. But instead of setting the access token on a `SpotifyWebAPI` instance, set the complete `Session` using the `setSession()` method and set the `auto_refresh` option. For example:

```php
$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

// When setting a complete Session instance, it's also not necessary to set the access token. It'll be automatically fetched from the Session instance
$api->setSession($session);
$api->setOptions([
    'auto_refresh' => true,
]);

// Call the API as usual
$api->me();

// Remember to fetch the tokens afterwards, they might have been updated
$newAccessToken = $session->getAccessToken();
$newRefreshToken = $session->getRefreshToken(); // Sometimes, a new refresh token will be returned
```

## With an existing refresh token

When you already have existing access and refresh tokens, add them to the `Session` instance and call the API.

```php
// $api have already been initialized, options set, etc.

// Use previously requested tokens fetched from somewhere. A database for example.
if ($accessToken) {
    $session->setAccessToken($accessToken);
    $session->setRefreshToken($refreshToken);
} else {
    // Or request a new access token
    $session->refreshAccessToken($refreshToken);
}

// Call the API as usual
$api->me();

// Remember to fetch the tokens afterwards, they might have been updated
$newAccessToken = $session->getAccessToken();
$newRefreshToken = $session->getRefreshToken(); // Sometimes, a new refresh token will be returned
```
