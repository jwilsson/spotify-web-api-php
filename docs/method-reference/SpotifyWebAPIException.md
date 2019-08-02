# SpotifyWebAPIException

## Constants
* **TOKEN_EXPIRED**

## Methods
### getReason


```php
SpotifyWebAPIException::getReason()
```

Returns the reason string from the requests error object


#### Return values
* **string** 

---
### hasExpiredToken


```php
SpotifyWebAPIException::hasExpiredToken()
```

Returns if the exception was thrown because of an expired token.


#### Return values
* **boolean** 

---
### setReason


```php
SpotifyWebAPIException::setReason($reason)
```

Set the reason string

#### Arguments
* `$reason` **string**


---
