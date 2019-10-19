# Session

## Constants

## Methods
### __construct


```php
Session::__construct($clientId, $clientSecret, $redirectUri, $request)
```

Constructor<br>
Set up client credentials.

#### Arguments
* `$clientId` **string** - The client ID.
* `$clientSecret` **string** - The client secret.
* `$redirectUri` **string** - Optional. The redirect URI.
* `$request` **\SpotifyWebAPI\Request** - Optional. The Request object to use.


---
### getAuthorizeUrl


```php
Session::getAuthorizeUrl($options)
```

Get the authorization URL.

#### Arguments
* `$options` **array\|object** - Optional. Options for the authorization URL.
    * array scope Optional. Scope(s) to request from the user.
    * boolean show_dialog Optional. Whether or not to force the user to always approve the app. Default is false.
    * string state Optional. A CSRF token.


#### Return values
* **string** The authorization URL.

---
### getAccessToken


```php
Session::getAccessToken()
```

Get the access token.


#### Return values
* **string** The access token.

---
### getClientId


```php
Session::getClientId()
```

Get the client ID.


#### Return values
* **string** The client ID.

---
### getClientSecret


```php
Session::getClientSecret()
```

Get the client secret.


#### Return values
* **string** The client secret.

---
### getTokenExpiration


```php
Session::getTokenExpiration()
```

Get the access token expiration time.


#### Return values
* **integer** A Unix timestamp indicating the token expiration time.

---
### getRedirectUri


```php
Session::getRedirectUri()
```

Get the client's redirect URI.


#### Return values
* **string** The redirect URI.

---
### getRefreshToken


```php
Session::getRefreshToken()
```

Get the refresh token.


#### Return values
* **string** The refresh token.

---
### getScope


```php
Session::getScope()
```

Get the scope for the current access token


#### Return values
* **array** The scope for the current access token

---
### refreshAccessToken


```php
Session::refreshAccessToken($refreshToken)
```

Refresh an access token.

#### Arguments
* `$refreshToken` **string** - Optional. The refresh token to use.

#### Return values
* **boolean** Whether the access token was successfully refreshed.

---
### requestCredentialsToken


```php
Session::requestCredentialsToken()
```

Request an access token using the Client Credentials Flow.


#### Return values
* **boolean** True when an access token was successfully granted, false otherwise.

---
### requestAccessToken


```php
Session::requestAccessToken($authorizationCode)
```

Request an access token given an authorization code.

#### Arguments
* `$authorizationCode` **string** - The authorization code from Spotify.

#### Return values
* **boolean** True when the access token was successfully granted, false otherwise.

---
### setAccessToken


```php
Session::setAccessToken($accessToken)
```

Set the access token.

#### Arguments
* `$accessToken` **string** - The access token

#### Return values
* **void** 

---
### setClientId


```php
Session::setClientId($clientId)
```

Set the client ID.

#### Arguments
* `$clientId` **string** - The client ID.

#### Return values
* **void** 

---
### setClientSecret


```php
Session::setClientSecret($clientSecret)
```

Set the client secret.

#### Arguments
* `$clientSecret` **string** - The client secret.

#### Return values
* **void** 

---
### setRedirectUri


```php
Session::setRedirectUri($redirectUri)
```

Set the client's redirect URI.

#### Arguments
* `$redirectUri` **string** - The redirect URI.

#### Return values
* **void** 

---
### setRefreshToken


```php
Session::setRefreshToken($refreshToken)
```

Set the session's refresh token.

#### Arguments
* `$refreshToken` **string** - The refresh token.

#### Return values
* **void** 

---
