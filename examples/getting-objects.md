---
layout: default
title: Getting artists, alumbs or tracks
---

    <?php
    require 'vendor/autoload.php';

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $track = $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb');

    echo '<b>' . $track->name . '</b> by <b>' . $track->artists[0]->name . '</b>';

Fetching artists or albums is extremely similar, just change `getTrack` to `getArtist` or `getAlbum`.

### Fetching multiple objects

    <?php
    require 'vendor/autoload.php';

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $artists = $api->getArtists(array('0oSGxfWSnnOXhD2fKuz2Gy', '3dBVyJ7JuOMt4GE9607Qin'));

    foreach ($artists->artists as $artist) {
        echo '<b>' . $artist->name . '</b> <br>';
    }

Of course, `getAlbums` and `getTracks` also exist and work in the same way.

### Getting all tracks on an album

    <?php
    $tracks = $api->getAlbumTracks('1oR3KrPIp4CbagPa3PhtPp');

    foreach ($tracks->items as $track) {
        echo '<b>' . $track->name . '</b> <br>';
    }

### Getting an artist's albums

    <?php
    $albums = $api->getArtistAlbums('6v8FB84lnmJs434UJf2Mrm');

    foreach ($albums->items as $album) {
        echo '<b>' . $album->name . '</b> <br>';
    }

### Getting an artist's related artists

    <?php
    $artists = $api->getArtistRelatedArtists('36QJpDe2go2KgaRleHCDTp');

    foreach ($artists->artists as $artist) {
        echo '<b>' . $artist->name . '</b> <br>';
    }

### Getting an artist’s top tracks

    <?php
    $tracks = $api->getArtistTopTracks('6v8FB84lnmJs434UJf2Mrm', 'se');

    foreach ($tracks->tracks as $track) {
        echo '<b>' . $track->name . '</b> <br>';
    }

Please see the [method reference]({{ site.baseurl }}/method-reference/spotifywebapi.html) for more available options for each method.
