<?php
error_reporting(-1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '',
    '',
    ''
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    print_r($api->me());
} else {
    $scopes = array(
        'scope' => array(
            'user-read-email',
            'user-library-modify',
        ),
    );

    header('Location: ' . $session->getAuthorizeUrl($scopes));
}
