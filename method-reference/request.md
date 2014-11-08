---
layout: default
title: Method Reference - Request
---

### SpotifyWebAPI\Request::account()

```
array SpotifyWebAPI\Request::account(string $method, string $uri, array $parameters, array $headers)
```

Make a request to the "account" endpoint.

#### Arguments

* $method **string** - The HTTP method to use.
* $uri **string** - The URI to request.
* $parameters **array** - Optional. Query parameters.
* $headers **array** - Optional. HTTP headers.

#### Return values

* **array** Response data.
    * body **array|object** The response body. Type is controlled by [Request::setReturnAssoc()](#spotifywebapirequestsetreturnassoc).
    * headers **string** Response headers.
    * status **int** HTTP status code.

### SpotifyWebAPI\Request::api()

```
array SpotifyWebAPI\Request::api(string $method, string $uri, array $parameters, array $headers)
```

Make a request to the "api" endpoint.

#### Arguments

* $method **string** - The HTTP method to use.
* $uri **string** - The URI to request.
* $parameters **array** - Optional. Query parameters.
* $headers **array** - Optional. HTTP headers.

#### Return values

* **array** Response data.
    * body **array|object** The response body. Type is controlled by [Request::setReturnAssoc()](#spotifywebapirequestsetreturnassoc).
    * headers **string** Response headers.
    * status **int** HTTP status code.

### SpotifyWebAPI\Request::getReturnAssoc()

```
boolean SpotifyWebAPI\Request::getReturnAssoc()
```

Get a value indicating the response body type.

#### Return values

* **bool** Whether the body is returned as an associative array or an stdClass.

### SpotifyWebAPI\Request::send()

```
array SpotifyWebAPI\Request::send(string $method, string $url, array $parameters, array $headers)
```

Make a request to Spotify. <br>
You'll probably want to use one of the convenience methods instead.

#### Arguments

* $method **string** - The HTTP method to use.
* $url **string** - The URL to request.
* $parameters **array** - Optional. Query parameters.
* $headers **array** - Optional. HTTP headers.

#### Return values

* **array** Response data.
    * body **array|object** The response body. Type is controlled by [Request::setReturnAssoc()](#spotifywebapirequestsetreturnassoc).
    * headers **string** Response headers.
    * status **int** HTTP status code.

### SpotifyWebAPI\Request::setReturnAssoc()

```
void SpotifyWebAPI\Request::setReturnAssoc(boolean $returnAssoc)
```

Set the return type for the response body.

#### Arguments

* $returnAssoc **boolean** - Whether to return an associative array or not.
