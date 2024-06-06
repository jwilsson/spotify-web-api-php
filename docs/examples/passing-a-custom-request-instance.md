# Passing a Custom Request Instance

Sometimes you want to pass a custom `Request` instance to `SpotifyWebAPI`. For example to use another HTTP library or provide additional logging.

This is possible by extending the `Request` class and providing your own `send` method.

```php
class MyRequest extends SpotifyWebAPI\Request
{
    public function send(string $method, string $url, string|array|object $parameters = [], array $headers = []): array
    {
        // Do your thing here

        // But be sure to set the lastResponse property for other parts to work correctly
        $this->lastResponse = [
            'body' => $body, // The JSON response body parsed to a PHP value
            'headers' => $headers, // An array of the headers returned
            'status' => $status, // The HTTP response status code
            'url' => $url, // The requested URL
        ];

        return $this->lastResponse;
    }
}
```

Then when you wish to use it, pass it to the `SpotifyWebAPI` and `Session` constructors.

```php
$request = new MyRequest();

$session = new SpotifyWebAPI\Session(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'REDIRECT_URI',
    $request
);

$api = new SpotifyWebAPI\SpotifyWebAPI(
    $options,
    $session,
    $request
);
```

## Helper functions
The `Request` class provides a few helper functions that can be useful when working with the responses from Spotify.

### handleResponseError
`protected function handleResponseError(string $body, int $status): void`

Takes the unparsed response body and tries to figure out what kind of error occured in order to provide some additional info in the error thrown.

### parseBody
`protected function parseBody(string $body): mixed`

Takes the unparsed response body and parses it, taking the [`return_assoc`](/docs/examples/setting-options.md#return_assoc) option into account.

### parseHeaders
`protected function parseHeaders(string $headers): array`

Takes the HTTP header block, parses it to a key-value array while normalizing header names. If you're using an external HTTP library it will most definitely already include a method for this.

### splitResponse
`protected function splitResponse(string $response): array`

Takes the full HTTP response and splits it into `headers` and `body` while stripping additional headers sometimes added by proxy servers.
