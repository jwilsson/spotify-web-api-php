# SpotifyWebAPIAuthException

## Constants
* **INVALID_CLIENT**
* **INVALID_CLIENT_SECRET**
* **INVALID_REFRESH_TOKEN**
* **TOKEN_EXPIRED**

## Methods
### hasInvalidCredentials


```php
SpotifyWebAPIAuthException::hasInvalidCredentials()
```

Returns if the exception was thrown because of invalid credentials.


#### Return values
* **boolean** 

---
### hasInvalidRefreshToken


```php
SpotifyWebAPIAuthException::hasInvalidRefreshToken()
```

Returns if the exception was thrown because of invalid refresh token.


#### Return values
* **boolean** 

---
### getReason


```php
SpotifyWebAPIAuthException::getReason()
```

Returns the reason string from the requests error object


#### Return values
* **string** 

---
### hasExpiredToken


```php
SpotifyWebAPIAuthException::hasExpiredToken()
```

Returns if the exception was thrown because of an expired token.


#### Return values
* **boolean** 

---
### setReason


```php
SpotifyWebAPIAuthException::setReason($reason)
```

Set the reason string

#### Arguments
* `$reason` **string**


---
