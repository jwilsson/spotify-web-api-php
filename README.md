# Spotify Web API PHP

This is a PHP implementation of the Spotify Web API. It includes the following:

* Helper methods for all API methods (Information about artists, albums and tracks).
* Search the Spotify catalog.
* Get information about users.
* Manage playlists for users.
* Authorization flow helpers.
* PSR-0 autoloading support.

## Requirements
PHP 5.3 or greater.

## Installation
1. If you're already using [https://getcomposer.org/](Composer) then you'll just need to include `SpotifyWebAPI` as a dependency. Otherwise, download the library and include the files.
1. Create a new app at https://developer.spotify.com/
2. Enter your app credentials
3. Call the API!

## Usage
Depending on the API methods your're planning on using you can choose bewteen authenticating the user or just go.

### Authenticating a user

```php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session('CLIENT_ID', 'CLIENT_SECRET', 'REDIRECT_URI');

// Get the authorization URL and send the user there
header('Location: ' . $session->getAuthorizeUrl(array('scope-1', 'scope-2')));
```

When receiving a request back to your redirect URI:

```php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session('CLIENT_ID', 'CLIENT_SECRET', 'REDIRECT_URI');

// Request a access token using the code from Spotify
$session->requestToken($_GET['code']);
$accessToken = $session->getAccessToken(); // We're good to go!

// Set the code on the API wrapper
SpotifyWebAPI\SpotifyWebAPI::setAccessToken($accessToken);
```
### Making API calls

```php
$track = SpotifyWebAPI\SpotifyWebAPI::getTrack('7EjyzZcbLxW7PaaLua9Ksb');

print_r($track);
```

## More examples

Get a album

```php
$album = SpotifyWebAPI\SpotifyWebAPI::getAlbum('7u6zL7kqpgLPISZYXNTgYk');

print_r($album);
```

Get multiple albums

```php
$albums = SpotifyWebAPI\SpotifyWebAPI::getAlbums(array('1oR3KrPIp4CbagPa3PhtPp', '6lPb7Eoon6QPbscWbMsk6a'));

print_r($albums);
```

Get an artist

```php
$artist = SpotifyWebAPI\SpotifyWebAPI::getArtist('36QJpDe2go2KgaRleHCDTp');

print_r($artist);
```

Get multiple artists

```php
$artists = SpotifyWebAPI\SpotifyWebAPI::getArtists(array('6v8FB84lnmJs434UJf2Mrm', '6olE6TJLqED3rqDCT0FyPh'));

print_r($artists);
```

Browse through `src/spotifywebapi.php` for more methods.
