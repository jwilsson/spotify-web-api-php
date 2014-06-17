<?php
function __autoload($class) {
    $class = strtolower($class);

    require_once $class . '.php';
}

$session = new Session(array(
    'client_id' => '',
    'client_secret' => '',
    'redirect_uri' => ''
));

if (isset($_GET['code'])) {
    $session->requestToken($_GET['code']);

    $response = Request::api('GET', 'v1/me', array(), array(
        'Authorization' => 'Bearer ' . $session->getAccessToken()
    ));

    print_r($response);
} else {
    header('Location: ' . $session->getAuthorizeURL('user-read-email'));
}
