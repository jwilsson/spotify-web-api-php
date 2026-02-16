# Managing a User's Library

There are lots of operations involving a user's library that can be performed. Remember to request the correct [scopes](working-with-scopes.md) beforehand.

## Adding items to a user's library

```php
$api->addMyLibrary([
    'spotify:album:album_id',
    'spotify:artist:artist_id',
    'spotify:episode:episode_id',
    'spotify:playlist:playlist_id',
    'spotify:show:show_id',
    'spotify:track:track_id',
    'spotify:user:user_id',
]);
```

## Deleting items from a user's library

```php
$api->deleteMyLibrary([
    'spotify:album:album_id',
    'spotify:artist:artist_id',
    'spotify:episode:episode_id',
    'spotify:playlist:playlist_id',
    'spotify:show:show_id',
    'spotify:track:track_id',
    'spotify:user:user_id',
]);
```

## Checking if items are present in a user's library

```php
$contains = $api->myLibraryContains([
    'spotify:album:album_id',
    'spotify:artist:artist_id',
    'spotify:episode:episode_id',
    'spotify:playlist:playlist_id',
    'spotify:show:show_id',
    'spotify:track:track_id',
    'spotify:user:user_id',
]);

var_dump($contains);
```

## Listing the tracks in a user's library

```php
$tracks = $api->getMySavedTracks([
    'limit' => 5,
]);

foreach ($tracks->items as $track) {
    $track = $track->track;

    echo '<a href="' . $track->external_urls->spotify . '">' . $track->name . '</a> <br>';
}
```

It's also possible to list the albums, audiobooks, podcast episodes, or podcast shows in a user's library using `getMySavedAlbums`, `getMySavedAudiobooks`, `getMySavedEpisodes`, or `getMySavedShows`.

## Adding tracks to a user's library

```php
$api->addMyTracks([
    'ids' => [
        'TRACK_ID',
        'TRACK_ID',
    ],
]);
```

```php
$api->addMyTracks([
    'timestamped_ids' => [
        ['id' => 'TRACK_ID', 'added_at' => '2025-10-01T11:00:00.000Z'],
        ['id' => 'TRACK_ID', 'added_at' => '2025-10-01T12:00:00.000Z'],
    ],
]);
```

## Adding albums, audiobooks, episodes, or shows to a user's library

*Note: These methods are only available to extended quota apps.*

```php
$api->addMyAlbums([
    'ALBUM_ID',
    'ALBUM_ID',
]);
```

```php
$api->addMyAudiobooks([
    'AUDIOBOOK_ID',
    'AUDIOBOOK_ID',
]);
```

```php
$api->addMyEpisodes([
    'EPISODE_ID',
    'EPISODE_ID',
]);
```

```php
$api->addMyShows([
    'SHOW_ID',
    'SHOW_ID',
]);
```

## Deleting tracks from a user's library

*Note: These methods are only available to extended quota apps.*

```php
$api->deleteMyTracks([
    'TRACK_ID',
    'TRACK_ID',
]);
```

It's also possible to delete an album, an audiobook, a podcast episode, or a podcast show from a user's library using `deleteMyAlbums`, `deleteMyAudiobooks`, `deleteMyEpisodes`, or `deleteMyShows`.

## Checking if tracks are present in a user's library

*Note: These methods are only available to extended quota apps.*

```php
$contains = $api->myTracksContains([
    'TRACK_ID',
    'TRACK_ID',
]);

var_dump($contains);
```

It's also possible to check if an album, an audiobook, a podcast episode, or a podcast show is present in a user's library using `myAlbumsContains`, `myAudiobooksContains`, `myEpisodesContains`, or `myShowsContains`.

Please see the [method reference](/docs/method-reference/SpotifyWebAPI.md) for more available options for each method.
