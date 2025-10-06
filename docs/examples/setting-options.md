# Setting options

There are a few options that can be used to control the behaviour of the API. All options can be set when initializing a new `SpotifyWebAPI` instance or by using the `setOptions()` method. Both approaches will merge the new options with the defaults and multiple calls to `setOptions()` will merge the new options with the ones already set.

```php
$options = [
    'auto_refresh' => true,
    'default_headers' => ['Accept-Language' => 'en-US'],
];

// Options can be set using the SpotifyWebAPI constructor
$api = new SpotifyWebAPI\SpotifyWebAPI($options);

// Or by using the setOptions method
$api->setOptions($options);
```

## Available options

### `auto_refresh`

* Possible values: `true`/`false` (default)

Used to control [automatic refresh of access tokens](refreshing-access-tokens.md#automatically-refreshing-access-tokens).

### `auto_retry`

* Possible values: `true`/`false` (default)

Used to control automatic retries of [rate limited requests](https://developer.spotify.com/documentation/web-api/guides/rate-limits/).

### `default_headers`

* Possible values: `[]` (default)

Used to set default HTTP headers that will be included in every request. For example `Accept-Language` to force Latin alphabet in returned results. Passed as key-value pairs, e.g. `['Accept-Language' => 'en-US']`.

### `return_assoc`

* Possible values: `true`/`false` (default)

Used to control return type of API calls. Setting it to `true` will return associative arrays instead of objects.
