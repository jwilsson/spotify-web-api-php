# Request

## Constants
* **ACCOUNT_URL**
* **API_URL**
* **RETURN_ASSOC**
* **RETURN_OBJECT**

## Methods
### account


```php
Request::account($method, $uri, $parameters, $headers)
```

Make a request to the "account" endpoint.

#### Arguments
* `$method` **string** - The HTTP method to use.
* `$uri` **string** - The URI to request.
* `$parameters` **array** - Optional. Query string parameters or HTTP body, depending on $method.
* `$headers` **array** - Optional. HTTP headers.

#### Return values
* **array** Response data.
    * array\|object body The response body. Type is controlled by `Request::setReturnType()`.
    * array headers Response headers.
    * int status HTTP status code.
    * string url The requested URL.

---
### api


```php
Request::api($method, $uri, $parameters, $headers)
```

Make a request to the "api" endpoint.

#### Arguments
* `$method` **string** - The HTTP method to use.
* `$uri` **string** - The URI to request.
* `$parameters` **array** - Optional. Query string parameters or HTTP body, depending on $method.
* `$headers` **array** - Optional. HTTP headers.

#### Return values
* **array** Response data.
    * array\|object body The response body. Type is controlled by `Request::setReturnType()`.
    * array headers Response headers.
    * int status HTTP status code.
    * string url The requested URL.

---
### getLastResponse


```php
Request::getLastResponse()
```

Get the latest full response from the Spotify API.


#### Return values
* **array** Response data.
    * array\|object body The response body. Type is controlled by `Request::setReturnType()`.
    * array headers Response headers.
    * int status HTTP status code.
    * string url The requested URL.

---
### getReturnType


```php
Request::getReturnType()
```

Get a value indicating the response body type.


#### Return values
* **string** A value indicating if the response body is an object or associative array.

---
### send


```php
Request::send($method, $url, $parameters, $headers)
```

Make a request to Spotify.<br>
You'll probably want to use one of the convenience methods instead.

#### Arguments
* `$method` **string** - The HTTP method to use.
* `$url` **string** - The URL to request.
* `$parameters` **array** - Optional. Query string parameters or HTTP body, depending on $method.
* `$headers` **array** - Optional. HTTP headers.

#### Return values
* **array** Response data.
    * array\|object body The response body. Type is controlled by `Request::setReturnType()`.
    * array headers Response headers.
    * int status HTTP status code.
    * string url The requested URL.

---
### setCurlOptions


```php
Request::setCurlOptions($options)
```

Set custom cURL options.<br>
Any options passed here will be merged with the defaults, overriding existing ones.

#### Arguments
* `$options` **array** - Any available cURL option.

#### Return values
* **void** 

---
### setReturnType


```php
Request::setReturnType($returnType)
```

Set the return type for the response body.

#### Arguments
* `$returnType` **string** - One of the Request::RETURN_* constants.

#### Return values
* **void** 

---
