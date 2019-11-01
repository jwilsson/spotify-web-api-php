# Setting options

There are a few options that can be used to control the behaviour of the API. All options are set using the `setOptions()` method which will then merge them with the defaults:

```php
$api->setOptions([
    'auto_refresh' => true,
]);
```

## Available options

### `auto_refresh`

* Possible values: `true`/`false` (default)

Used to control [automatic refresh of access tokens](automatically-refreshing-access-tokens.md).

### `auto_retry`

* Possible values: `true`/`false` (default)

Used to control automatic retries of [rate limited requests](https://developer.spotify.com/documentation/web-api/#rate-limiting).
