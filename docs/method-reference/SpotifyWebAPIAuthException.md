# SpotifyWebAPIAuthException

## Constants
* **INVALID_CLIENT**
* **INVALID_CLIENT_SECRET**
* **INVALID_REFRESH_TOKEN**
* **TOKEN_EXPIRED**
* **RATE_LIMIT_STATUS**

## Methods
### hasInvalidCredentials


```php
SpotifyWebAPIAuthException::hasInvalidCredentials()
```

Returns whether the exception was thrown because of invalid credentials.


#### Return values
* **boolean** 

---
### hasInvalidRefreshToken


```php
SpotifyWebAPIAuthException::hasInvalidRefreshToken()
```

Returns whether the exception was thrown because of an invalid refresh token.


#### Return values
* **boolean** 

---
### getReason


```php
SpotifyWebAPIAuthException::getReason()
```

Returns the reason string from the request's error object.


#### Return values
* **string** 

---
### hasExpiredToken


```php
SpotifyWebAPIAuthException::hasExpiredToken()
```

Returns whether the exception was thrown because of an expired access token.


#### Return values
* **boolean** 

---
### isRateLimited


```php
SpotifyWebAPIAuthException::isRateLimited()
```

Returns whether the exception was thrown because of rate limiting.


#### Return values
* **boolean** 

---
### setReason


```php
SpotifyWebAPIAuthException::setReason($reason)
```

Set the reason string.

#### Arguments
* `$reason` **string**

#### Return values
* **void** 

---
