---
layout: default
title: Get artists, alumbs or tracks
---

    <?php
    require 'vendor/autoload.php';

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $track = $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb');

    echo '<b>' . $track->name . '</b> by <b>' . $track->artists[0]->name . '</b>';

Fetching artists or albums is extremely similar, just change `getTrack` to `getArtist` or `getAlbum`.

It's also possible to fetch multiple objects, like this:

    <?php
    require 'vendor/autoload.php';

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $artists = $api->getArtists(array('0oSGxfWSnnOXhD2fKuz2Gy', '3dBVyJ7JuOMt4GE9607Qin'));

    foreach ($artists as $artist) {
        echo '<b>' . $artist->name . '</b> <br>';
    }

Of course, `getAlbums` and `getTracks` also exist and work in the same way.
