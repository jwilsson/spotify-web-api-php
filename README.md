# Spotify Web API PHP

[![Build Status](https://travis-ci.org/jwilsson/spotify-web-api-php.svg?branch=master)](https://travis-ci.org/jwilsson/spotify-web-api-php)
[![Latest Stable Version](https://poser.pugx.org/jwilsson/spotify-web-api-php/v/stable.svg)](https://packagist.org/packages/jwilsson/spotify-web-api-php)
[![Latest Unstable Version](https://poser.pugx.org/jwilsson/spotify-web-api-php/v/unstable.svg)](https://packagist.org/packages/jwilsson/spotify-web-api-php)
[![License](https://poser.pugx.org/jwilsson/spotify-web-api-php/license.svg)](https://packagist.org/packages/jwilsson/spotify-web-api-php)

This is a PHP implementation of the Spotify Web API. It includes the following:

* Helper methods for all API methods (Information about artists, albums and tracks).
* Search the Spotify catalog.
* Get information about users and their music library.
* Manage playlists for users.
* Authorization flow helpers.
* PSR-4 autoloading support.

## Requirements
PHP 5.3 or greater.

## Installation
1. If you're already using [Composer](https://getcomposer.org/) then you'll just need to include `jwilsson/spotify-web-api-php` as a dependency. Otherwise, download the library and include the files.
2. Create a new app at https://developer.spotify.com/
3. Enter your app credentials.
4. Call the API!

## Usage
Depending on the API methods you're planning on using you can choose between authenticating the user or just go.

### Authenticating a user

#### Using Authorization Code Flow

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

#### Using Client Credentials Flow
```php
require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session('CLIENT_ID', 'CLIENT_SECRET', 'REDIRECT_URI');

// Request a access token with optional scopes
$session->requestCredentialsToken(array('scope-1', 'scope-2'));
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

Get all tracks from an album

```php
$tracks = SpotifyWebAPI\SpotifyWebAPI::getAlbumTracks('1oR3KrPIp4CbagPa3PhtPp');

print_r($tracks);
```

Get an artist

```php
$artist = SpotifyWebAPI\SpotifyWebAPI::getArtist('36QJpDe2go2KgaRleHCDTp');

print_r($artist);
```

Get an artist's related artists

```php
$artists = SpotifyWebAPI\SpotifyWebAPI::getArtistRelatedArtists('36QJpDe2go2KgaRleHCDTp');

print_r($artists);
```

Get multiple artists

```php
$artists = SpotifyWebAPI\SpotifyWebAPI::getArtists(array('6v8FB84lnmJs434UJf2Mrm', '6olE6TJLqED3rqDCT0FyPh'));

print_r($artists);
```

Get all albums by an artist

```php
$albums = SpotifyWebAPI\SpotifyWebAPI::getArtistAlbums('6v8FB84lnmJs434UJf2Mrm');

print_r($albums);
```

Get an artist's top tracks in a country

```php
$tracks = SpotifyWebAPI\SpotifyWebAPI::getArtistTopTracks('6v8FB84lnmJs434UJf2Mrm', 'se');

print_r($tracks);
```

Get a track

```php
$track = SpotifyWebAPI\SpotifyWebAPI::getTrack('7EjyzZcbLxW7PaaLua9Ksb');

print_r($track);
```

Get multiple tracks

```php
$tracks = SpotifyWebAPI\SpotifyWebAPI::getTracks(array('0eGsygTp906u18L0Oimnem', '1lDWb6b6ieDQ2xT7ewTC3G'));

print_r($tracks);
```

Get a user

```php
$user = SpotifyWebAPI\SpotifyWebAPI::getUser('mcgurk');

print_r($user);
```

Get a user's playlists

```php
$playlists = SpotifyWebAPI\SpotifyWebAPI::getUserPlaylists('mcgurk');

print_r($playlists);
```

Get a specific playlist

```php
$playlists = SpotifyWebAPI\SpotifyWebAPI::getUserPlaylist('mcgurk', '606nLQuR41ZaA2vEZ4Ofb8');

print_r($playlists);
```

Get all tracks in a user's playlist

```php
$tracks = SpotifyWebAPI\SpotifyWebAPI::getUserPlaylistTracks('mcgurk', '606nLQuR41ZaA2vEZ4Ofb8');

print_r($tracks);
```

Get the currently authenticated user

```php
$user = SpotifyWebAPI\SpotifyWebAPI::me();

print_r($user);
```

Search for an album

```php
$albums = SpotifyWebAPI\SpotifyWebAPI::search('blur', 'album');

print_r($albums);
```

Search for an artist

```php
$artists = SpotifyWebAPI\SpotifyWebAPI::search('blur', 'artist');

print_r($artists);
```

Search for a track

```php
$tracks = SpotifyWebAPI\SpotifyWebAPI::search('song 2', 'track');

print_r($tracks);
```

Search with a limit

```php
$tracks = SpotifyWebAPI\SpotifyWebAPI::search('song 2', 'track', 5);

print_r($tracks);
```

Browse through `src/spotifywebapi.php` and look at the tests for more methods and examples.
