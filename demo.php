<?php
function __autoload($class) {
    $class = $class;

    require_once $class . '.php';
}

$config = json_decode(file_get_contents('config.json'), true);
$session = new Session($config);

if (isset($_GET['code'])) {
    $session->requestToken($_GET['code']);
    $response = '';

    // Get tracks from an album
    /*$album = new Album('41MnTivkwTO3UUJ8DrqEJJ');
    $response = $album->getTracks();*/

    // Get the current user's info
    /*$response = Request::api('GET', 'v1/me', array(), array(
        'Authorization' => 'Bearer ' . $session->getAccessToken()
    ));*/

    print_r($response);
} else {
    header('Location: ' . $session->getAuthorizeURL('user-read-email'));
}
