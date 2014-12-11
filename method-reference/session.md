---
layout: default
title: Method Reference - Session
---

### __construct()

```
void SpotifyWebAPI\Session::__construct(string $clientId, string $clientSecret, string $redirectUri, SpotifyWebAPI\Request $request)
```

Constructor <br>
Set up client credentials.

#### Arguments

* $clientId **string** - The client ID.
* $clientSecret **string** - The client secret.
* $redirectUri **string** - Optional. The redirect URI.
* $request **[SpotifyWebAPI\Request](request.html)** - Optional. The Request object to use.

### getAuthorizeUrl()

```
string SpotifyWebAPI\Session::getAuthorizeUrl(array|object $options)
```

Get the authorization URL.

#### Arguments

* $options **array\|object** - Optional. Options for the authorization URL.
    * scope **array** Optional. Scope(s) to request from the user.
    * show_dialog **boolean** Optional. Whether or not to force the user to always approve the app. Default is false.
    * state **string** Optional. A CSRF token.

#### Return values

* **string** The authorization URL.

### getAccessToken()

```
string SpotifyWebAPI\Session::getAccessToken()
```

Get the access token.

#### Return values

* **string** The access token.

### getClientId()

```
string SpotifyWebAPI\Session::getClientId()
```

Get the client ID.

#### Return values

* **string** The client ID.

### getClientSecret()

```
string SpotifyWebAPI\Session::getClientSecret()
```

Get the client secret.

#### Return values

* **string** The client secret.

### getExpires()

```
integer SpotifyWebAPI\Session::getExpires()
```

Get the number of seconds before the access token expires.

#### Return values

* **string** The expires time.

### getRedirectUri()

```
string SpotifyWebAPI\Session::getRedirectUri()
```

Get the client's redirect URI.

#### Return values

* **string** The redirect URI.

### getRefreshToken()

```
string SpotifyWebAPI\Session::getRefreshToken()
```

Get the refresh token.

#### Return values

* **string** The refresh token.

### refreshToken()

```
boolean SpotifyWebAPI\Session::refreshToken()
```

Refresh a access token.

#### Return values

* **boolean** Whether the access token was successfully refreshed.

### requestCredentialsToken()

```
boolean SpotifyWebAPI\Session::requestCredentialsToken(array $scope)
```

Request a access token using the Client Credentials Flow.

#### Arguments

* $scope **array** - Optional. Scope(s) to request from the user.

#### Return values

* **boolean** Whether a access token was successfully granted.

### requestToken()

```
boolean SpotifyWebAPI\Session::requestToken(string $code)
```

Request a access token.

#### Arguments

* $code **string** - The authorization code from Spotify.

#### Return values

* **boolean** Whether a access token was successfully granted.

### setClientId()

```
void SpotifyWebAPI\Session::setClientId(string $clientId)
```

Set the client ID.

#### Arguments

* $clientId **string** - The client ID.

### setClientSecret()

```
void SpotifyWebAPI\Session::setClientSecret(string $clientSecret)
```

Set the client secret.

#### Arguments

* $clientSecret **string** - The client secret.

### setRedirectUri()

```
void SpotifyWebAPI\Session::setRedirectUri(string $redirectUri)
```

Set the client's redirect URI.

#### Arguments

* $redirectUri **string** - The redirect URI.

### setRefreshToken()

```
void SpotifyWebAPI\Session::setRefreshToken(string $refreshToken)
```

Set the refresh token.

#### Arguments

* $refreshToken **string** - The refresh token.
