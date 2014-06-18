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

    // Get many albums
    /*$album = new Album();
    $albums = $album->getMany(array(
        '41MnTivkwTO3UUJ8DrqEJJ',
        '6JWc4iAiJ9FjyK0B59ABb4',
        '6UXCm6bOO4gFlDQZV5yL37'
    ));

    print_r($albums);*/

    // Get the current user's info
    /*$response = Request::api('GET', 'v1/me', array(), array(
        'Authorization' => 'Bearer ' . $session->getAccessToken()
    ));

    print_r($response);*/
} else {
    header('Location: ' . $session->getAuthorizeURL('user-read-email'));
}
