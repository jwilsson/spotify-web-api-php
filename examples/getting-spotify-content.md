---
layout: default
title: Getting Spotify featured content
---

    <?php
    require 'vendor/autoload.php';

    $session = new SpotifyWebAPI\Session('SPOTIFY_CLIENT_ID', 'SPOTIFY_CLIENT_SECRET', 'SPOTIFY_REDIRECT_URI');
    $api = new SpotifyWebAPI\SpotifyWebAPI();

    if (isset($_GET['code'])) {
        $session->requestToken($_GET['code']);
        $api->setAccessToken($session->getAccessToken());
    } else {
        header('Location: ' . $session->getAuthorizeUrl());
        die();
    }

### Getting a list of new releases

    <?php
    $releases = $api->getNewReleases(array(
        'country' => 'se'
    ));

    foreach ($releases->albums->items as $album) {
        echo '<a href="' . $album->external_urls->spotify . '">' . $album->name . '</a> <br>';
    }

### Getting a list of featured playlists

    <?php
    $playlists = $api->getFeaturedPlaylists(array(
        'country' => 'se',
        'locale' => 'sv_SE',
        'timestamp' => '2015-01-17T21:00:00', // Saturday night
    ));

    foreach ($playlists->playlists->items as $playlist) {
        echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
    }

Please see the [method reference]({{ site.baseurl }}/method-reference/spotifywebapi.html) for more available options for each method.
