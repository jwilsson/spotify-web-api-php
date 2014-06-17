<?php
function __autoload($class) {
    $class = strtolower($class);

    require_once $class . '.php';
}

$config = json_decode(file_get_contents('config.json'), true);
$session = new Session($config);

if (isset($_GET['code'])) {
    $session->requestToken($_GET['code']);

    $response = Request::api('GET', 'v1/me', array(), array(
        'Authorization' => 'Bearer ' . $session->getAccessToken()
    ));

    print_r($response);
} else {
    header('Location: ' . $session->getAuthorizeURL('user-read-email'));
}
