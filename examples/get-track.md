---
layout: default
title: Get a track
---

    <?php
    require 'vendor/autoload.php';

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $track = $api->getTrack('7EjyzZcbLxW7PaaLua9Ksb');

    echo '<b>' . $track->name . '</b> by <b>' . $track->artists[0]->name . '</b>';
