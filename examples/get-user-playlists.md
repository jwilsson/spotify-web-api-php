---
layout: default
title: Get a user's playlists
---

    <?php
    require 'vendor/autoload.php';

    $session = new SpotifyWebAPI\Session('SPOTIFY_CLIENT_ID', 'SPOTIFY_CLIENT_SECRET', 'SPOTIFY_REDIRECT_URI');
    $api = new SpotifyWebAPI\SpotifyWebAPI();

    if (isset($_GET['code'])) {
        $session->requestToken($_GET['code']);
        $api->setAccessToken($session->getAccessToken());

        $playlists = $api->getUserPlaylists('wizzler', array(
            'limit' => 5
        ));

        foreach ($playlists->items as $playlist) {
            echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a> <br>';
        }
    } else {
        header('Location: ' . $session->getAuthorizeUrl(array(
            'scope' => array('user-read-email', 'user-library-modify')
        )));
    }
