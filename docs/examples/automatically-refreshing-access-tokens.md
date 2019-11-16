# Automatically Refreshing Access Tokens

Start off by requesting an access token using the [Authorization Code Flow](access-token-with-authorization-code-flow.md). But instead of setting the access token on a `SpotifyWebAPI` instance, set the complete `Session` instance using the `setSession()` method. Remember to also set the `auto_refresh` option to `true`. For example:

```php
$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

// When setting a complete Session instance, it's not necessary to set the access token. It'll be fetched automatically from the Session instance
$api->setSession($session);
$api->setOptions([
    'auto_refresh' => true,
]);

// Call the API as usual
$api->me();

// Remember to grab the tokens afterwards, they might have been updated
$newAccessToken = $session->getAccessToken();
$newRefreshToken = $session->getRefreshToken(); // Sometimes, a new refresh token will be returned
```

## With an existing refresh token

When you already have existing access and refresh tokens, add them to the `Session` instance and call the API.

```php
$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET'
);

// Use previously requested tokens fetched from somewhere. A database for example.
if ($accessToken) {
    $session->setAccessToken($accessToken);
    $session->setRefreshToken($refreshToken);
} else {
    // Or request a new access token
    $session->refreshAccessToken($refreshToken);
}

$api = new SpotifyWebAPI\SpotifyWebAPI();

$api->setSession($session);
$api->setOptions([
    'auto_refresh' => true,
]);

// Call the API as usual
$api->me();

// Remember to grab the tokens afterwards, they might have been updated
$newAccessToken = $session->getAccessToken();
$newRefreshToken = $session->getRefreshToken(); // Sometimes, a new refresh token will be returned
```
