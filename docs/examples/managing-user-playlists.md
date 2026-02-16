# Managing a User's Playlists

There are lots of operations involving user's playlists that can be performed. Remember to request the correct [scopes](working-with-scopes.md) beforehand.

## Listing a user's playlists

*Note: This method is only available to extended quota apps.*

```php
$playlists = $api->getUserPlaylists('USER_ID', [
    'limit' => 5
]);

foreach ($playlists->items as $playlist) {
    echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
}
```

## Getting info about a specific playlist

```php
$playlist = $api->getPlaylist('PLAYLIST_ID');

echo $playlist->name;
```

## Getting the image of a user's playlist
```php
$playlistImage = $api->getPlaylistImage('PLAYLIST_ID');
```

## Getting all items in a playlist

```php
$playlistItems = $api->getPlaylistItems('PLAYLIST_ID');

foreach ($playlistItems->items as $item) {
    $item = $item->item;

    echo '<a href="' . $item->external_urls->spotify . '">' . $item->name . '</a> <br>';
}
```

## Creating a new playlist

```php
$api->createPlaylist('USER_ID', [
    'name' => 'My shiny playlist'
]);
```

## Updating the details of a user's playlist

```php
$api->updatePlaylist('PLAYLIST_ID', [
    'name' => 'New name'
]);
```

## Updating the image of a user's playlist
```php
$imageData = base64_encode(file_get_contents('image.jpg'));

$api->updatePlaylistImage('PLAYLIST_ID', $imageData);
```

## Adding tracks to a user's playlist

```php
$api->addPlaylistItems('PLAYLIST_ID', [
    'TRACK_URI',
    'EPISODE_URI'
]);
```

## Delete items from a user's playlist

```php
$items = [
    ['uri' => 'TRACK_URI'],
    ['uri' => 'EPISODE_URI'],
];

$api->deletePlaylistItems('PLAYLIST_ID', $tracks, 'SNAPSHOT_ID');
```

## Updating the items in a playlist

```php
$items = [
    'TRACK_URI',
    'EPISODE_URI'
];

$options = [
    'insert_before' => 10,
];

$api->updatePlaylistItems('PLAYLIST_ID', $items, $options, 'SNAPSHOT_ID');
```

Please see the [method reference](/docs/method-reference/SpotifyWebAPI.md) for more available options for each method.
