---
layout: default
title: Searching the Spotify catalog
---

    <?php
    require 'vendor/autoload.php';

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $results = $api->search('blur', 'artist');

    foreach ($results->artists->items as $artist) {
        echo $artist->name, '<br>';
    }

There are lots of different options to use when searching. Please refer to the [Spotify documentation](https://developer.spotify.com/web-api/search-item/) for more information.
