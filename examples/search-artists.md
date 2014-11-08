---
layout: default
title: Search for artists
---

    <?php
    require 'vendor/autoload.php';

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $results = $api->search('blur', 'artist');

    foreach ($results->artists->items as $artist) {
        echo $artist->name, '<br>';
    }
