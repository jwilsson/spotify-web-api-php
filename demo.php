<?php
error_reporting(-1);
ini_set('display_errors', 1);

function __autoload($class) {
    $class = $class;

    require_once $class . '.php';
}

$config = json_decode(file_get_contents('config.json'), true);
$session = new Session($config);

if (isset($_GET['code'])) {
    $session->requestToken($_GET['code']);

    // Get many artists
    $artist = new Artist();
    $artists = $artist->getMany(array(
        '0oSGxfWSnnOXhD2fKuz2Gy',
        '3dBVyJ7JuOMt4GE9607Qin'
    ));

    print_r($artists);

    // Get album tracks
    /*$album = new Album('41MnTivkwTO3UUJ8DrqEJJ');
    $tracks = $album->getTracks();

    print_r($tracks);*/

    // Get the current user's info
    /*$response = Request::api('GET', 'v1/me', array(), array(
        'Authorization' => 'Bearer ' . $session->getAccessToken()
    ));

    print_r($response);*/
} else {
    header('Location: ' . $session->getAuthorizeURL('user-read-email'));
}
