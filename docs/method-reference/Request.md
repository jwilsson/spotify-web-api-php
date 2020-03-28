# Request

## Constants
* **ACCOUNT_URL**
* **API_URL**
* **RETURN_ASSOC**
* **RETURN_OBJECT**

## Methods
### __construct


```php
Request::__construct($options)
```

Constructor<br>
Set options.

#### Arguments
* `$options` **array\|object** - Optional. Options to set.


---
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
    * array\|object body The response body. Type is controlled by the `return_assoc` option.
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
    * array\|object body The response body. Type is controlled by the `return_assoc` option.
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
    * array\|object body The response body. Type is controlled by the `return_assoc` option.
    * array headers Response headers.
    * int status HTTP status code.
    * string url The requested URL.

---
### getReturnType

_Deprecated_

```php
Request::getReturnType()
```

Use the `return_assoc` option instead.


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
    * array\|object body The response body. Type is controlled by the `return_assoc` option.
    * array headers Response headers.
    * int status HTTP status code.
    * string url The requested URL.

---
### setCurlOptions

_Deprecated_

```php
Request::setCurlOptions($options)
```

Use the `curl_options` option instead.<br>
<br>
Any options passed here will be merged with the defaults, overriding existing ones.

#### Arguments
* `$options` **array** - Any available cURL option.

#### Return values
* **void** 

---
### setOptions


```php
Request::setOptions($options)
```

Set options

#### Arguments
* `$options` **array\|object** - Options to set.

#### Return values
* **void** 

---
### setReturnType

_Deprecated_

```php
Request::setReturnType($returnType)
```

Use the `return_assoc` option instead.

#### Arguments
* `$returnType` **string** - One of the Request::RETURN_* constants.

#### Return values
* **void** 

---
