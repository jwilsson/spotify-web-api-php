<?php
error_reporting(-1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session('', '', '');

if (isset($_GET['code'])) {
    $session->requestToken($_GET['code']);

    SpotifyWebAPI\SpotifyWebAPI::setAccessToken($session->getAccessToken());

    print_r(SpotifyWebAPI\SpotifyWebAPI::me());
} else {
    header('Location: ' . $session->getAuthorizeUrl(array('user-read-email')));
}
