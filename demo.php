<?php
error_reporting(-1);
ini_set('display_errors', 1);

function __autoload($class) {
    $class = $class;

    require_once 'src/' . $class . '.php';
}

$session = new Session('', '', '');

if (isset($_GET['code'])) {
    $session->requestToken($_GET['code']);

    SpotifyWebAPI::setAccessToken($session->getAccessToken());

    print_r(SpotifyWebAPI::me());
    //print_r(SpotifyWebAPI::getAlbum('0sNOF9WDwhWunNAHPD3Baj'));
} else {
    header('Location: ' . $session->getAuthorizeUrl(array('user-read-email')));
}
