# Spotify Web API PHP

This is a PHP implementation of the Spotify Web API. It includes the following:

* Helper methods for all API methods (Information about artists, albums and tracks).
* Search the Spotify catalog.
* Get information about users.
* Manage playlists for users.
* Authorization flow helpers.

## Requirements
PHP 5.3 or greater.

## Installation
1. Create a new app at https://developer.spotify.com/
2. Enter your app credentials
3. Call the API!

## Usage
Depending on the API methods your're planning on using you can choose bewteen authenticating the user or just go.

### Authenticating a user

```php
require_once 'src/session.php';

$session = new Session('CLIENT_ID', 'CLIENT_SECRET', 'REDIRECT_URI');

// Get the authorization URL and send the user there
header('Location: ' . $session->getAuthorizeUrl(array('scope-1', 'scope-2')));
```

When receiving a request back to your redirect URI:

```php
// Request a access token using the code from Spotify
$session->requestToken($_GET['code']);
$accessToken = $session->getAccessToken(); // We're good to go!

// Set the code on the API wrapper
SpotifyWebAPI::setAccessToken($accessToken);
```
### Making API calls

```php
$track = SpotifyWebAPI::getTrack('7EjyzZcbLxW7PaaLua9Ksb');

print_r($track);
```

## More examples

Get a album

```php
$album = SpotifyWebAPI::getAlbum('7u6zL7kqpgLPISZYXNTgYk');

print_r($album);
```

Get multiple albums

```php
$albums = SpotifyWebAPI::getAlbums(array('1oR3KrPIp4CbagPa3PhtPp', '6lPb7Eoon6QPbscWbMsk6a'));

print_r($albums);
```

Get an artist

```php
$artist = SpotifyWebAPI::getArtist('36QJpDe2go2KgaRleHCDTp');

print_r($artist);
```

Get multiple artists

```php
$artists = SpotifyWebAPI::getArtists(array('6v8FB84lnmJs434UJf2Mrm', '6olE6TJLqED3rqDCT0FyPh'));

print_r($artists);
```

Browse through `src/spotifywebapi.php` for more methods.
