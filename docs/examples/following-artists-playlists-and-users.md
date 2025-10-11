# Following Artists, Playlists, and Users

A Spotify user can follow artists, playlists, and users. The API contains methods for all of this functionality.

## Following an artist or user

```php
$api->followArtistsOrUsers('artist', 'ARTIST_ID');
```

## Unfollowing an artist or user

```php
$api->unfollowArtistsOrUsers('artist', 'ARTIST_ID');
```

## Checking if a user is following an artist or user

```php
$following = $api->currentUserFollows('user', 'spotify');

var_dump($following);
```

## Following a playlist

```php
$api->followPlaylist('PLAYLIST_ID');
```

## Unfollowing a playlist

```php
$api->unfollowPlaylist('PLAYLIST_ID');
```

## Checking if the current user is following a playlist

```php
$api->currentUserFollowsPlaylist('PLAYLIST_ID');
```

Please see the [method reference](/docs/method-reference/SpotifyWebAPI.md) for more available options for each method.
