<?php
error_reporting(-1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '40eba578acc44b5cae8680ccd5542b4f',
    '6b3bf52a554e4f788ae5259699bb8b60',
    'http://localhost:8888/spotify-web-api-php/demo.php'
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    print_r($api->getMyCurrentPlaybackInfo());
} else {
    $scopes = [
        'scope' => [
            'user-read-email',
            'user-library-modify',
            'user-read-playback-state',
            'user-modify-playback-state',
            'user-read-currently-playing',
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($scopes));
}
